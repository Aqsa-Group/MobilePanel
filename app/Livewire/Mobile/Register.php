<?php

namespace App\Livewire\Mobile;

use App\Models\AppNotification;
use App\Models\RegisterDevice;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Register extends Component
{
    use WithFileUploads;

    public $formKey;

    public $customer_name;
    public $customer_phone;
    public $customer_tazkira_id;
    public $customer_address;
    public $customer_image;
    public $tazkira_image;

    public $category;
    public $model;
    public $color;
    public $carton_image;
    public $device_image;
    public $imei;

    public $showAiModal = false;
    public $aiIssues = [];
    public $aiReport = [];

    public function mount(): void
    {
        $this->formKey = uniqid();
    }

    protected function rules(): array
    {
        return [
            'customer_name' => 'required|string|max:150',
            'customer_phone' => ['required', 'regex:/^07[0-9]{8}$/'],
            'customer_tazkira_id' => ['required', 'regex:/^\d{4}-\d{4}-\d{5}$/', 'max:15'],
            'customer_address' => 'required',
            'category' => 'required',
            'model' => 'required',
            'color' => 'required',
            'customer_image' => 'required|image|max:6144',
            'device_image' => 'required|image|max:6144',
            'tazkira_image' => 'required|image|max:6144',
            'carton_image' => 'required|image|max:6144',
            'imei' => 'required|string|min:8|max:64|unique:registers,imei',
        ];
    }

    protected $messages = [
        'customer_name.required' => 'نام کامل الزامی است.',
        'customer_phone.required' => 'شماره تماس الزامی است.',
        'customer_phone.regex' => 'شماره تماس باید با 07 شروع شود و ۱۰ رقم باشد.',
        'customer_tazkira_id.required' => 'آیدی تذکره الزامی است.',
        'customer_tazkira_id.regex' => 'فرمت آیدی تذکره نادرست است. مثال: 1234-5678-91234',
        'customer_address.required' => 'آدرس مالک الزامی است.',
        'category.required' => 'کتگوری دستگاه الزامی است.',
        'model.required' => 'نام دستگاه الزامی است.',
        'color.required' => 'رنگ دستگاه الزامی است.',
        'customer_image.required' => 'عکس مشتری الزامی است.',
        'device_image.required' => 'عکس دستگاه الزامی است.',
        'tazkira_image.required' => 'عکس تذکره الزامی است.',
        'carton_image.required' => 'عکس کارتن دستگاه الزامی است.',
        'imei.required' => 'شماره IMEI الزامی است.',
        'imei.unique' => 'شماره IMEI قبلاً ثبت شده است.',
        'customer_image.image' => 'فایل عکس مشتری معتبر نیست.',
        'device_image.image' => 'فایل عکس دستگاه معتبر نیست.',
        'tazkira_image.image' => 'فایل عکس تذکره معتبر نیست.',
        'carton_image.image' => 'فایل عکس کارتن معتبر نیست.',
        'customer_image.max' => 'حجم عکس مشتری باید کمتر از ۶ مگابایت باشد.',
        'device_image.max' => 'حجم عکس دستگاه باید کمتر از ۶ مگابایت باشد.',
        'tazkira_image.max' => 'حجم عکس تذکره باید کمتر از ۶ مگابایت باشد.',
        'carton_image.max' => 'حجم عکس کارتن باید کمتر از ۶ مگابایت باشد.',
    ];

    protected $validationAttributes = [
        'customer_name' => 'نام کامل',
        'customer_phone' => 'شماره تماس',
        'customer_tazkira_id' => 'آیدی تذکره',
        'customer_address' => 'آدرس',
        'category' => 'کتگوری',
        'model' => 'مدل دستگاه',
        'color' => 'رنگ',
        'customer_image' => 'عکس مشتری',
        'device_image' => 'عکس دستگاه',
        'tazkira_image' => 'عکس تذکره',
        'carton_image' => 'عکس کارتن دستگاه',
        'imei' => 'شماره IMEI',
    ];

    public function updatedCustomerImage(): void
    {
        $this->runAiChecks();
    }

    public function updatedDeviceImage(): void
    {
        $this->runAiChecks();
    }

    public function updatedImei(): void
    {
        $this->imei = $this->convertToEnglishNumber((string) $this->imei);
        $this->runAiChecks();
    }

    public function updatedCustomerPhone(): void
    {
        $this->customer_phone = $this->convertToEnglishNumber((string) $this->customer_phone);
    }

    public function updatedCustomerTazkiraId(): void
    {
        $this->customer_tazkira_id = $this->convertToEnglishNumber((string) $this->customer_tazkira_id);
    }

    private function runAiChecks(): void
    {
        $issues = [];
        $report = [
            'customer' => [],
            'device' => [],
        ];

        if ($this->customer_image) {
            $customerAnalysis = $this->analyzeImage(
                $this->customer_image->getRealPath(),
                'customer',
                (string) $this->customer_image->getClientOriginalName()
            );
            $report['customer'] = $customerAnalysis;

            if ($customerAnalysis['low_light']) {
                $issues[] = 'نور عکس مشتری کم است. لطفا در نور بهتر عکس بگیرید.';
            }
            if ($customerAnalysis['too_much_light']) {
                $issues[] = 'نور عکس مشتری بیش از حد است. لطفا نور را متعادل کنید.';
            }
            if (!$customerAnalysis['enough_resolution']) {
                $issues[] = 'عکس مشتری واضح نیست. حداقل 600x600 باشد.';
            }
            if (!$customerAnalysis['looks_without_glasses']) {
                $issues[] = 'هوش مصنوعی احتمال می‌دهد مشتری عینک/لنز دارد. لطفا عکس بدون عینک ثبت کنید.';
            }
        }

        if ($this->device_image) {
            $deviceAnalysis = $this->analyzeImage(
                $this->device_image->getRealPath(),
                'device',
                (string) $this->device_image->getClientOriginalName()
            );
            $report['device'] = $deviceAnalysis;

            if ($deviceAnalysis['low_light']) {
                $issues[] = 'نور عکس دستگاه کم است. لطفا عکس روشن‌تر بگیرید.';
            }
            if ($deviceAnalysis['too_much_light']) {
                $issues[] = 'نور عکس دستگاه بیش از حد است. لطفا نور را متعادل کنید.';
            }
            if (!$deviceAnalysis['enough_resolution']) {
                $issues[] = 'عکس دستگاه واضح نیست. لطفا عکس واضح‌تر ثبت کنید.';
            }
        }

        if (!empty($this->imei) && strlen(trim((string) $this->imei)) < 8) {
            $issues[] = 'IMEI واردشده کوتاه است (حداقل 8 کاراکتر).';
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
        if ($type === 'customer') {
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

    public function save(): void
    {
        $this->customer_phone = $this->convertToEnglishNumber((string) $this->customer_phone);
        $this->customer_tazkira_id = $this->convertToEnglishNumber((string) $this->customer_tazkira_id);
        $this->imei = $this->convertToEnglishNumber((string) $this->imei);

        $this->validate();
        $this->runAiChecks();

        if (!empty($this->aiIssues)) {
            $this->showAiModal = true;
            return;
        }

        $imeiValue = trim((string) $this->imei);
        if ($imeiValue === '') {
            $imeiValue = $this->generateUniqueImei();
        }

        $isDuplicateOwnerDevice = RegisterDevice::query()
            ->where('customer_name', trim((string) $this->customer_name))
            ->where('customer_phone', trim((string) $this->customer_phone))
            ->where('model', trim((string) $this->model))
            ->where('category', trim((string) $this->category))
            ->exists();

        if ($isDuplicateOwnerDevice) {
            $this->addError('model', 'این مالک با همین دستگاه قبلاً ثبت شده است.');
            return;
        }

        $register = RegisterDevice::create([
            'customer_name' => $this->customer_name,
            'customer_phone' => $this->customer_phone,
            'customer_tazkira_id' => $this->customer_tazkira_id,
            'customer_address' => $this->customer_address,
            'category' => $this->category,
            'model' => $this->model,
            'color' => $this->color,
            'imei' => $imeiValue,
            'customer_image' => $this->storeOptimizedImage($this->customer_image, 'customers'),
            'tazkira_image' => $this->storeOptimizedImage($this->tazkira_image, 'tazkira'),
            'carton_image' => $this->storeOptimizedImage($this->carton_image, 'cartons'),
            'device_image' => $this->storeOptimizedImage($this->device_image, 'devices'),
            'status' => 'pending',
            'submitted_by_user_id' => auth()->id(),
            'shop_name' => trim((string) (auth()->user()->name ?? auth()->user()->username ?? 'فروشگاه')),
            'ai_report' => $this->aiReport,
        ]);

        AppNotification::create([
            'target_guard' => 'admin2',
            'target_user_id' => null,
            'scope' => 'broadcast_admin2',
            'type' => 'register_submitted',
            'title' => 'درخواست جدید ثبت دستگاه',
            'message' => "{$register->shop_name} یک دستگاه با IMEI {$register->imei} برای تایید فرستاد.",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('admin2.register-device', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addDays(7),
        ]);

        AppNotification::create([
            'target_guard' => 'web',
            'target_user_id' => auth()->id(),
            'scope' => 'single',
            'type' => 'register_submitted',
            'title' => 'درخواست ارسال شد',
            'message' => "دستگاه با IMEI {$register->imei} برای تایید مدیریت ارسال شد.",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('seller.register.list', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        session()->flash('success', 'ثبت انجام شد و برای تایید مدیریت ارسال گردید.');
        $this->resetForm();
    }

    private function generateUniqueImei(): string
    {
        do {
            $candidate = 'AUTO-IMEI-' . strtoupper(Str::random(10));
        } while (RegisterDevice::where('imei', $candidate)->exists());

        return $candidate;
    }

    private function convertToEnglishNumber(string $value): string
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($persian, $english, $value);
    }

    private function storeOptimizedImage($file, string $directory): ?string
    {
        if (!$file) {
            return null;
        }

        $realPath = $file->getRealPath();
        if (!$realPath || !is_file($realPath) || !function_exists('imagecreatefromstring')) {
            return $file->store($directory, 'public');
        }

        $binary = @file_get_contents($realPath);
        if ($binary === false) {
            return $file->store($directory, 'public');
        }

        $image = @imagecreatefromstring($binary);
        if (!$image) {
            return $file->store($directory, 'public');
        }

        $mime = strtolower((string) $file->getMimeType());
        $encoded = null;
        $extension = 'jpg';

        try {
            ob_start();

            if ($mime === 'image/png') {
                imagealphablending($image, false);
                imagesavealpha($image, true);
                imagepng($image, null, 9);
                $extension = 'png';
            } elseif ($mime === 'image/webp' && function_exists('imagewebp')) {
                imagewebp($image, null, 100);
                $extension = 'webp';
            } elseif ($mime === 'image/gif' && function_exists('imagegif')) {
                imagegif($image);
                $extension = 'gif';
            } else {
                imageinterlace($image, true);
                imagejpeg($image, null, 92);
                $extension = 'jpg';
            }

            $encoded = ob_get_clean();
        } catch (\Throwable $e) {
            if (ob_get_level() > 0) {
                ob_end_clean();
            }
            imagedestroy($image);
            return $file->store($directory, 'public');
        }

        imagedestroy($image);

        if (!is_string($encoded) || $encoded === '') {
            return $file->store($directory, 'public');
        }

        $path = $directory . '/img_' . now()->format('YmdHis') . '_' . Str::random(10) . '.' . $extension;
        Storage::disk('public')->put($path, $encoded);

        return $path;
    }

    public function cancel(): void
    {
        $this->resetForm();
    }

    private function resetForm(): void
    {
        $this->reset([
            'customer_name',
            'customer_phone',
            'customer_tazkira_id',
            'customer_address',
            'customer_image',
            'tazkira_image',
            'category',
            'model',
            'color',
            'carton_image',
            'device_image',
            'imei',
            'aiIssues',
            'aiReport',
        ]);

        $this->resetValidation();
        $this->formKey = uniqid();
    }

    public function closeAiModal(): void
    {
        $this->showAiModal = false;
    }

    public function render()
    {
        return view('livewire.mobile.register');
    }
}
