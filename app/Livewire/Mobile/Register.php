<?php

namespace App\Livewire\Mobile;

use App\Models\AppNotification;
use App\Models\DeviceReport;
use App\Models\RegisterDevice;
use App\Models\Store;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
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
    public $isEditMode = false;
    public $editingRegisterId = null;
    public $existingCustomerImage = null;
    public $existingTazkiraImage = null;
    public $existingCartonImage = null;
    public $existingDeviceImage = null;

    public function mount(): void
    {
        $this->formKey = uniqid();

        $editId = (int) request()->query('edit_register_id', 0);
        if ($editId > 0) {
            $this->loadRegisterForEdit($editId);
            return;
        }

        $this->ensureAdminAccess();
    }

    private function ensureAdminAccess(): void
    {
        $user = auth()->user();

        if (!$user || !$user->isStoreAdmin()) {
            abort(403);
        }
    }

    private function currentStore(): ?Store
    {
        $user = auth()->user();

        if (!$user) {
            return null;
        }

        return Store::query()
            ->where('admin_user_id', $user->storeOwnerId())
            ->first();
    }

    protected function rules(): array
    {
        $imageRule = $this->isEditMode ? 'nullable|image|max:6144' : 'required|image|max:6144';
        $imeiUniqueRule = Rule::unique('registers', 'imei');
        if ($this->isEditMode && $this->editingRegisterId) {
            $imeiUniqueRule = $imeiUniqueRule->ignore($this->editingRegisterId);
        }

        return [
            'customer_name' => 'required|string|max:150',
            'customer_phone' => ['required', 'regex:/^07[0-9]{8}$/'],
            'customer_tazkira_id' => ['required', 'regex:/^\d{4}-\d{4}-\d{5}$/', 'max:15'],
            'customer_address' => 'required',
            'category' => 'required',
            'model' => 'required',
            'color' => 'required',
            'customer_image' => $imageRule,
            'device_image' => $imageRule,
            'tazkira_image' => $imageRule,
            'carton_image' => $imageRule,
            'imei' => [
                'nullable',
                'string',
                'min:8',
                'max:64',
                $imeiUniqueRule,
            ],
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

    private function loadRegisterForEdit(int $id): void
    {
        $register = RegisterDevice::query()
            ->where('id', $id)
            ->where('submitted_by_user_id', auth()->id())
            ->where('status', 'blocked')
            ->first();

        if (!$register) {
            session()->flash('error', 'این دستگاه برای ویرایش در دسترس نیست.');
            $this->redirectRoute('seller.register.list');
            return;
        }

        $this->isEditMode = true;
        $this->editingRegisterId = (int) $register->id;

        $this->customer_name = (string) ($register->customer_name ?? '');
        $this->customer_phone = (string) ($register->customer_phone ?? '');
        $this->customer_tazkira_id = (string) ($register->customer_tazkira_id ?? '');
        $this->customer_address = (string) ($register->customer_address ?? '');
        $this->category = (string) ($register->category ?? '');
        $this->model = (string) ($register->model ?? '');
        $this->color = (string) ($register->color ?? '');
        $this->imei = (string) ($register->imei ?? '');

        $this->existingCustomerImage = $register->customer_image;
        $this->existingTazkiraImage = $register->tazkira_image;
        $this->existingCartonImage = $register->carton_image;
        $this->existingDeviceImage = $register->device_image;
        $this->aiReport = (array) ($register->ai_report ?? []);
    }

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

    public function updatedCartonImage(): void
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
            'device' => [],
            'carton' => [],
        ];

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

        if ($this->carton_image) {
            $cartonAnalysis = $this->analyzeImage(
                $this->carton_image->getRealPath(),
                'carton',
                (string) $this->carton_image->getClientOriginalName()
            );
            $report['carton'] = $cartonAnalysis;

            if ($cartonAnalysis['low_light']) {
                $issues[] = 'نور عکس کارتن کم است. لطفا عکس روشن‌تر بگیرید.';
            }
            if ($cartonAnalysis['too_much_light']) {
                $issues[] = 'نور عکس کارتن بیش از حد است. لطفا نور را متعادل کنید.';
            }
            if (!$cartonAnalysis['enough_resolution']) {
                $issues[] = 'عکس کارتن واضح نیست. لطفا عکس واضح‌تر ثبت کنید.';
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

        return [
            'width' => $width,
            'height' => $height,
            'pixels' => $pixels,
            'enough_resolution' => $width >= 600 && $height >= 600,
            'brightness_score' => round($brightness, 2),
            'enough_light' => !$lowLight && !$tooMuchLight,
            'low_light' => $lowLight,
            'too_much_light' => $tooMuchLight,
            'type' => $type,
            'checked_at' => now()->toDateTimeString(),
        ];
    }

    public function save(): void
    {
        if (!$this->isEditMode) {
            $this->ensureAdminAccess();
        }

        $store = $this->currentStore();
        if (!$store && !$this->isEditMode) {
            session()->flash('error', 'ابتدا مشخصات فروشگاه را ثبت کنید.');
            $this->redirectRoute('store.onboarding');
            return;
        }

        $this->customer_phone = $this->convertToEnglishNumber((string) $this->customer_phone);
        $this->customer_tazkira_id = $this->convertToEnglishNumber((string) $this->customer_tazkira_id);
        $this->imei = trim($this->convertToEnglishNumber((string) $this->imei));

        if ($this->imei === '') {
            $this->imei = null;
        }

        $this->validate();
        $this->runAiChecks();

        if (!empty($this->aiIssues)) {
            $this->showAiModal = true;
            return;
        }

        $editingRegister = null;
        if ($this->isEditMode && $this->editingRegisterId) {
            $editingRegister = RegisterDevice::query()
                ->where('id', $this->editingRegisterId)
                ->where('submitted_by_user_id', auth()->id())
                ->where('status', 'blocked')
                ->first();

            if (!$editingRegister) {
                session()->flash('error', 'رکورد برای ویرایش یافت نشد یا قابل ویرایش نیست.');
                $this->redirectRoute('seller.register.list');
                return;
            }
        }

        $imeiValue = trim((string) $this->imei);
        if ($imeiValue === '') {
            if ($editingRegister && trim((string) $editingRegister->imei) !== '') {
                $imeiValue = trim((string) $editingRegister->imei);
            } else {
                $imeiValue = $this->generateUniqueImei();
            }
        }

        $blockMessage = $this->resolveBlockedRegistrationMessage(
            $imeiValue,
            trim((string) $this->customer_name),
            trim((string) $this->customer_phone),
            trim((string) $this->customer_tazkira_id),
            $editingRegister ? (int) $editingRegister->id : null
        );

        if ($blockMessage !== null) {
            $this->addError('imei', $blockMessage);
            session()->flash('error', $blockMessage);
            return;
        }

        $duplicateQuery = RegisterDevice::query()
            ->where('customer_name', trim((string) $this->customer_name))
            ->where('customer_phone', trim((string) $this->customer_phone))
            ->where('model', trim((string) $this->model))
            ->where('category', trim((string) $this->category));

        if ($editingRegister) {
            $duplicateQuery->where('id', '!=', $editingRegister->id);
        }

        $isDuplicateOwnerDevice = $duplicateQuery->exists();

        if ($isDuplicateOwnerDevice) {
            $this->addError('model', 'این مالک با همین دستگاه قبلاً ثبت شده است.');
            return;
        }

        $payload = [
            'customer_name' => trim((string) $this->customer_name),
            'customer_phone' => trim((string) $this->customer_phone),
            'customer_tazkira_id' => trim((string) $this->customer_tazkira_id),
            'customer_address' => trim((string) $this->customer_address),
            'category' => trim((string) $this->category),
            'model' => trim((string) $this->model),
            'color' => trim((string) $this->color),
            'imei' => $imeiValue,
            'status' => 'pending',
            'submitted_by_user_id' => auth()->id(),
            'shop_name' => trim((string) ($store->store_name ?? ($editingRegister->shop_name ?? 'فروشگاه'))),
            'reviewed_by_admin2_id' => null,
            'reviewed_at' => null,
            'review_note' => null,
        ];

        if ($editingRegister) {
            $payload['customer_image'] = $this->customer_image
                ? $this->storeOptimizedImage($this->customer_image, 'customers')
                : $editingRegister->customer_image;
            $payload['tazkira_image'] = $this->tazkira_image
                ? $this->storeOptimizedImage($this->tazkira_image, 'tazkira')
                : $editingRegister->tazkira_image;
            $payload['carton_image'] = $this->carton_image
                ? $this->storeOptimizedImage($this->carton_image, 'cartons')
                : $editingRegister->carton_image;
            $payload['device_image'] = $this->device_image
                ? $this->storeOptimizedImage($this->device_image, 'devices')
                : $editingRegister->device_image;
            $payload['ai_report'] = !empty($this->aiReport) ? $this->aiReport : $editingRegister->ai_report;

            $editingRegister->update($payload);
            $register = $editingRegister->refresh();
        } else {
            $payload['customer_image'] = $this->storeOptimizedImage($this->customer_image, 'customers');
            $payload['tazkira_image'] = $this->storeOptimizedImage($this->tazkira_image, 'tazkira');
            $payload['carton_image'] = $this->storeOptimizedImage($this->carton_image, 'cartons');
            $payload['device_image'] = $this->storeOptimizedImage($this->device_image, 'devices');
            $payload['ai_report'] = $this->aiReport;

            $register = RegisterDevice::create($payload);
        }

        AppNotification::create([
            'target_guard' => 'admin2',
            'target_user_id' => null,
            'scope' => 'broadcast_admin2',
            'type' => $this->isEditMode ? 'register_resubmitted' : 'register_submitted',
            'title' => $this->isEditMode ? 'درخواست ویرایش دستگاه' : 'درخواست جدید ثبت دستگاه',
            'message' => $this->isEditMode
                ? "{$register->shop_name} دستگاه IMEI {$register->imei} را ویرایش و دوباره برای تایید فرستاد."
                : "{$register->shop_name} یک دستگاه با IMEI {$register->imei} برای تایید فرستاد.",
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
            'type' => $this->isEditMode ? 'register_resubmitted' : 'register_submitted',
            'title' => $this->isEditMode ? 'ویرایش ارسال شد' : 'درخواست ارسال شد',
            'message' => $this->isEditMode
                ? "ویرایش دستگاه با IMEI {$register->imei} برای تایید مدیریت ارسال شد."
                : "دستگاه با IMEI {$register->imei} برای تایید مدیریت ارسال شد.",
            'payload' => [
                'register_id' => $register->id,
                'link' => route('seller.register.list', ['view_register_id' => $register->id]),
            ],
            'expires_at' => now()->addMinutes(5),
        ]);

        if ($this->isEditMode) {
            session()->flash('success', 'ویرایش انجام شد و دوباره برای تایید مدیریت ارسال گردید.');
            $this->redirectRoute('seller.register.list', ['view_register_id' => $register->id]);
            return;
        }

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

    private function resolveBlockedRegistrationMessage(
        string $imei,
        string $ownerName,
        string $ownerPhone,
        string $ownerNationalId,
        ?int $ignoreRegisterId = null
    ): ?string {
        $blockedRegister = RegisterDevice::query()
            ->when($ignoreRegisterId, function ($query, $id) {
                $query->where('id', '!=', (int) $id);
            })
            ->where('status', 'blocked')
            ->where(function ($query) use ($imei, $ownerName, $ownerPhone, $ownerNationalId) {
                $applied = false;

                if ($imei !== '') {
                    $query->where('imei', $imei);
                    $applied = true;
                }

                if ($ownerName !== '' && $ownerPhone !== '') {
                    $method = $applied ? 'orWhere' : 'where';
                    $query->{$method}(function ($ownerQuery) use ($ownerName, $ownerPhone) {
                        $ownerQuery->where('customer_name', $ownerName)
                            ->where('customer_phone', $ownerPhone);
                    });
                    $applied = true;
                }

                if ($ownerNationalId !== '') {
                    if ($applied) {
                        $query->orWhere('customer_tazkira_id', $ownerNationalId);
                    } else {
                        $query->where('customer_tazkira_id', $ownerNationalId);
                    }
                    $applied = true;
                }

                if (!$applied) {
                    $query->whereRaw('1 = 0');
                }
            })
            ->where(function ($query) {
                $query->where('review_note', 'like', '%REPORTED_BLOCK%')
                    ->orWhere('review_note', 'like', '%گزارش IMEI%')
                    ->orWhere('review_note', 'like', '%سرقت%')
                    ->orWhere('review_note', 'like', '%مفقود%');
            })
            ->latest('id')
            ->first();

        if ($blockedRegister) {
            $reason = trim((string) ($blockedRegister->review_note ?? ''));
            if ($reason === '') {
                $reason = 'این دستگاه به دلیل گزارش سرقت/مفقودی بلاک شده است.';
            }

            return "این دستگاه/مالک قابل ثبت یا فروش نیست. دلیل: {$reason}";
        }

        $blockedReport = DeviceReport::query()
            ->where('status', 'verified')
            ->where(function ($query) use ($imei, $ownerName, $ownerPhone, $ownerNationalId) {
                $applied = false;

                if ($imei !== '') {
                    $query->where('device_imei', $imei);
                    $applied = true;
                }

                if ($ownerName !== '' && $ownerPhone !== '') {
                    $method = $applied ? 'orWhere' : 'where';
                    $query->{$method}(function ($ownerQuery) use ($ownerName, $ownerPhone) {
                        $ownerQuery->where('owner_full_name', $ownerName)
                            ->where('owner_phone', $ownerPhone);
                    });
                    $applied = true;
                }

                if ($ownerNationalId !== '') {
                    if ($applied) {
                        $query->orWhere('owner_national_id', $ownerNationalId);
                    } else {
                        $query->where('owner_national_id', $ownerNationalId);
                    }
                    $applied = true;
                }

                if (!$applied) {
                    $query->whereRaw('1 = 0');
                }
            })
            ->latest('id')
            ->first();

        if (!$blockedReport) {
            return null;
        }

        $reportType = (string) $blockedReport->incident_type === 'stolen' ? 'سرقت' : 'مفقودی';
        $reason = trim((string) ($blockedReport->incident_description ?? ''));
        if ($reason === '') {
            $reason = "گزارش {$reportType} توسط مدیریت تایید شده است.";
        }

        return "این دستگاه/مالک به دلیل گزارش {$reportType} قابل ثبت یا فروش نیست. دلیل: {$reason}";
    }

    private function convertToEnglishNumber(string $value): string
    {
        $from = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $to = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        return str_replace($from, $to, $value);
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
        if ($this->isEditMode) {
            $this->redirectRoute('seller.register.list');
            return;
        }

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
            'isEditMode',
            'editingRegisterId',
            'existingCustomerImage',
            'existingTazkiraImage',
            'existingCartonImage',
            'existingDeviceImage',
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
