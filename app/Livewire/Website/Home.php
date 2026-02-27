<?php

namespace App\Livewire\Website;

use App\Models\RegisterDevice;
use Morilog\Jalali\Jalalian;
use Livewire\Component;

class Home extends Component
{
    public string $imeiInput = '';
    public bool $showImeiModal = false;
    public string $imeiState = 'idle';
    public string $imeiMessage = '';
    public ?array $imeiDevice = null;

    public function updatedImeiInput(): void
    {
        $this->imeiInput = $this->normalizeImeiInput((string) $this->imeiInput);
    }

    public function searchImei(): void
    {
        $imei = $this->normalizeImeiInput((string) $this->imeiInput);
        $this->imeiInput = $imei;
        $this->imeiDevice = null;

        $isNumericImei = preg_match('/^\d{8,20}$/', $imei) === 1;
        $isAutoImei = preg_match('/^(AUTO-IMEI-[A-Z0-9]{4,}|IMEI-[A-Z0-9]{4,})$/', $imei) === 1;

        if ($imei === '' || (!$isNumericImei && !$isAutoImei)) {
            $this->imeiState = 'invalid';
            $this->imeiMessage = 'لطفاً IMEI ثبت‌شده (حداقل 8 رقم) یا کد اتومات دستگاه را درست وارد کنید.';
            $this->showImeiModal = true;
            return;
        }

        $device = RegisterDevice::query()
            ->whereRaw('UPPER(imei) = ?', [$imei])
            ->latest('id')
            ->first();

        if (!$device) {
            $this->imeiState = 'not_found';
            $this->imeiMessage = 'این دستگاه در سیستم ثبت نیست.';
            $this->showImeiModal = true;
            return;
        }

        $status = (string) ($device->status ?? 'pending');
        $statusLabel = 'در انتظار';
        if ($status === 'approved') {
            $statusLabel = 'تایید شده';
        } elseif ($status === 'blocked') {
            $statusLabel = 'بلاک شده';
        }

        $createdAtLabel = '-';
        if ($device->created_at) {
            $createdAtLabel = Jalalian::fromDateTime($device->created_at)->format('Y/m/d') . ' ' . $device->created_at->format('h:i A');
        }

        $this->imeiDevice = [
            'id' => (int) $device->id,
            'imei' => (string) $device->imei,
            'status' => $status,
            'status_label' => $statusLabel,
            'customer_name' => (string) ($device->customer_name ?? '-'),
            'customer_phone' => (string) ($device->customer_phone ?? '-'),
            'customer_tazkira_id' => (string) ($device->customer_tazkira_id ?? '-'),
            'customer_address' => (string) ($device->customer_address ?? '-'),
            'model' => (string) ($device->model ?? '-'),
            'color' => (string) ($device->color ?? '-'),
            'category' => (string) ($device->category ?? '-'),
            'shop_name' => (string) ($device->shop_name ?? '-'),
            'review_note' => (string) ($device->review_note ?? ''),
            'created_at_label' => $createdAtLabel,
            'customer_image' => (string) ($device->customer_image ?? ''),
            'device_image' => (string) ($device->device_image ?? ''),
            'tazkira_image' => (string) ($device->tazkira_image ?? ''),
            'carton_image' => (string) ($device->carton_image ?? ''),
        ];

        if ($status === 'blocked') {
            $reason = trim((string) ($device->review_note ?? ''));
            $this->imeiState = 'blocked';
            $this->imeiMessage = $reason !== ''
                ? "این دستگاه بلاک است. دلیل: {$reason}"
                : 'این دستگاه بلاک است.';
        } else {
            $this->imeiState = 'found';
            $this->imeiMessage = 'دستگاه در سیستم ثبت شده است.';
        }

        $this->showImeiModal = true;
    }

    public function closeImeiModal(): void
    {
        $this->showImeiModal = false;
    }

    private function normalizeImeiInput(string $value): string
    {
        $value = $this->convertToEnglishNumber($value);
        $value = preg_replace('/\s+/', '', $value) ?? '';

        return strtoupper(trim($value));
    }

    private function convertToEnglishNumber(string $value): string
    {
        $from = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
        $to = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($from, $to, $value);
    }

    public function render()
    {
        return view('livewire.website.home') ->layout('livewire.website.layouts.app');
    }
}
