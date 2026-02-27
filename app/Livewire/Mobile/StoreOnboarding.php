<?php

namespace App\Livewire\Mobile;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreOnboarding extends Component
{
    use WithFileUploads;

    public $store_name;
    public $owner_name;
    public $address;
    public $phone;
    public $tazkira_id;
    public $owner_photo;
    public $license_number;
    public $license_photo;
    public $showAiModal = false;
    public $aiIssues = [];
    public $aiReport = [];

    public function mount(): void
    {
        $user = auth()->user();

        if (!$user || !$user->isStoreAdmin()) {
            abort(403);
        }

        $alreadyRegistered = Store::query()
            ->where('admin_user_id', $user->storeOwnerId())
            ->exists();

        if ($alreadyRegistered) {
            $this->redirectRoute('welcome');
            return;
        }

        $this->owner_name = trim((string) ($user->name ?? ''));
    }

    protected function rules(): array
    {
        return [
            'store_name' => 'required|string|max:150',
            'owner_name' => 'required|string|max:150',
            'address' => 'required|string|max:300',
            'phone' => ['required', 'regex:/^07[0-9]{8}$/'],
            'tazkira_id' => 'required|string|max:50',
            'license_number' => 'required|string|max:100',
            'owner_photo' => 'required|image|max:4096',
            'license_photo' => 'required|image|max:4096',
        ];
    }

    protected $messages = [
        'store_name.required' => 'نام فروشگاه الزامی است.',
        'owner_name.required' => 'نام مالک الزامی است.',
        'address.required' => 'آدرس فروشگاه الزامی است.',
        'phone.required' => 'شماره تماس الزامی است.',
        'phone.regex' => 'شماره تماس باید با 07 شروع شود و ۱۰ رقم باشد.',
        'tazkira_id.required' => 'آیدی تذکره الزامی است.',
        'license_number.required' => 'شماره جواز الزامی است.',
        'owner_photo.required' => 'عکس مالک الزامی است.',
        'owner_photo.image' => 'فایل عکس مالک معتبر نیست.',
        'owner_photo.max' => 'حجم عکس مالک باید کمتر از ۴ مگابایت باشد.',
        'license_photo.required' => 'عکس جواز الزامی است.',
        'license_photo.image' => 'فایل عکس جواز معتبر نیست.',
        'license_photo.max' => 'حجم عکس جواز باید کمتر از ۴ مگابایت باشد.',
    ];

    public function updatedPhone(): void
    {
        $this->phone = $this->convertToEnglishNumber((string) $this->phone);
    }

    public function updatedTazkiraId(): void
    {
        $this->tazkira_id = $this->convertToEnglishNumber((string) $this->tazkira_id);
    }

    public function updatedLicenseNumber(): void
    {
        $this->license_number = $this->convertToEnglishNumber((string) $this->license_number);
    }

    public function updatedOwnerPhoto(): void
    {
        $this->runAiChecks();
    }

    public function updatedLicensePhoto(): void
    {
        $this->runAiChecks();
    }

    private function runAiChecks(): void
    {
        $issues = [];
        $report = [
            'owner' => [],
            'license' => [],
        ];

        if ($this->owner_photo) {
            $ownerAnalysis = $this->analyzeImage(
                $this->owner_photo->getRealPath(),
                'owner',
                (string) $this->owner_photo->getClientOriginalName()
            );
            $report['owner'] = $ownerAnalysis;

            if ($ownerAnalysis['low_light']) {
                $issues[] = 'نور عکس مالک کم است. لطفا در نور بهتر عکس بگیرید.';
            }
            if ($ownerAnalysis['too_much_light']) {
                $issues[] = 'نور عکس مالک بیش از حد است. لطفا نور را متعادل کنید.';
            }
            if (!$ownerAnalysis['enough_resolution']) {
                $issues[] = 'عکس مالک واضح نیست. حداقل 600x600 باشد.';
            }
            if (!$ownerAnalysis['looks_without_glasses']) {
                $issues[] = 'هوش مصنوعی احتمال می‌دهد مالک عینک/لنز دارد. لطفا عکس بدون عینک ثبت کنید.';
            }
        }

        if ($this->license_photo) {
            $licenseAnalysis = $this->analyzeImage(
                $this->license_photo->getRealPath(),
                'license',
                (string) $this->license_photo->getClientOriginalName()
            );
            $report['license'] = $licenseAnalysis;

            if ($licenseAnalysis['low_light']) {
                $issues[] = 'نور عکس جواز کم است. لطفا عکس روشن‌تر بگیرید.';
            }
            if ($licenseAnalysis['too_much_light']) {
                $issues[] = 'نور عکس جواز بیش از حد است. لطفا نور را متعادل کنید.';
            }
            if (!$licenseAnalysis['enough_resolution']) {
                $issues[] = 'عکس جواز واضح نیست. لطفا عکس واضح‌تر ثبت کنید.';
            }
        }

        $this->aiIssues = $issues;
        $this->aiReport = $report;
        $this->showAiModal = !empty($issues);
    }

    private function analyzeImage(string $path, string $type, string $originalName = ''): array
    {
        $size = @getimagesize($path);
        $width = $size[0] ?? 0;
        $height = $size[1] ?? 0;
        $pixels = max(1, $width * $height);

        $brightness = 0;
        $lowLight = false;
        $tooMuchLight = false;
        if (function_exists('imagecreatefromstring')) {
            $content = @file_get_contents($path);
            if ($content !== false) {
                $img = @imagecreatefromstring($content);
                if ($img) {
                    $sample = 0;
                    $sum = 0;
                    $stepX = max(1, (int) floor($width / 20));
                    $stepY = max(1, (int) floor($height / 20));
                    for ($x = 0; $x < $width; $x += $stepX) {
                        for ($y = 0; $y < $height; $y += $stepY) {
                            $rgb = imagecolorat($img, $x, $y);
                            $r = ($rgb >> 16) & 0xFF;
                            $g = ($rgb >> 8) & 0xFF;
                            $b = $rgb & 0xFF;
                            $sum += (0.299 * $r + 0.587 * $g + 0.114 * $b);
                            $sample++;
                        }
                    }
                    if ($sample > 0) {
                        $brightness = $sum / $sample;
                    }
                    imagedestroy($img);
                }
            }
        }
        if ($brightness > 0) {
            $lowLight = $brightness < 65;
            $tooMuchLight = $brightness > 215;
        }

        $filename = strtolower(trim($originalName) !== '' ? $originalName : pathinfo($path, PATHINFO_BASENAME));
        $looksWithoutGlasses = true;
        if ($type === 'owner') {
            $looksWithoutGlasses = !str_contains($filename, 'glass')
                && !str_contains($filename, 'glasses')
                && !str_contains($filename, 'lens');
        }

        return [
            'width' => $width,
            'height' => $height,
            'pixels' => $pixels,
            'enough_resolution' => $width >= 600 && $height >= 600,
            'brightness_score' => round($brightness, 2),
            'enough_light' => !$lowLight && !$tooMuchLight,
            'low_light' => $lowLight,
            'too_much_light' => $tooMuchLight,
            'looks_without_glasses' => $looksWithoutGlasses,
            'checked_at' => now()->toDateTimeString(),
        ];
    }

    private function convertToEnglishNumber(string $value): string
    {
        return strtr($value, [
            '۰' => '0',
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '٠' => '0',
            '١' => '1',
            '٢' => '2',
            '٣' => '3',
            '٤' => '4',
            '٥' => '5',
            '٦' => '6',
            '٧' => '7',
            '٨' => '8',
            '٩' => '9',
        ]);
    }

    public function closeAiModal(): void
    {
        $this->showAiModal = false;
    }

    public function save(): void
    {
        $user = auth()->user();

        if (!$user || !$user->isStoreAdmin()) {
            abort(403);
        }

        $this->phone = trim($this->convertToEnglishNumber((string) $this->phone));
        $this->tazkira_id = trim($this->convertToEnglishNumber((string) $this->tazkira_id));
        $this->license_number = trim($this->convertToEnglishNumber((string) $this->license_number));

        $this->validate();

        $exists = Store::query()
            ->where('admin_user_id', $user->storeOwnerId())
            ->exists();

        if ($exists) {
            session()->flash('error', 'فروشگاه شما قبلا ثبت شده است.');
            $this->redirectRoute('welcome');
            return;
        }

        $this->runAiChecks();

        if (!empty($this->aiIssues)) {
            $this->showAiModal = true;
            return;
        }

        Store::create([
            'admin_user_id' => $user->storeOwnerId(),
            'store_name' => trim((string) $this->store_name),
            'owner_name' => trim((string) $this->owner_name),
            'address' => trim((string) $this->address),
            'phone' => trim((string) $this->phone),
            'tazkira_id' => trim((string) $this->tazkira_id),
            'license_number' => trim((string) $this->license_number),
            'owner_photo' => $this->owner_photo ? $this->owner_photo->store('owners', 'public') : null,
            'license_photo' => $this->license_photo ? $this->license_photo->store('licenses', 'public') : null,
            'status' => 1,
        ]);

        session()->flash('success', 'فروشگاه با موفقیت ثبت شد.');
        $this->redirectRoute('welcome');
    }

    public function render()
    {
        return view('livewire.mobile.store-onboarding')
            ->layout('Mobile.layouts.app');
    }
}
