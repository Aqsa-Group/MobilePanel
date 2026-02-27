<?php

namespace App\Livewire\Website;

use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;
use Throwable;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;
    public $formKey;

    private const FALLBACK_RECEIVER_EMAIL = 'edristemory33@gmail.com';

    public function mount(): void
    {
        $this->formKey = uniqid();
        $this->fillFromAuthenticatedUser();
    }

    protected function messages()
    {
        return [
            'message.required' => 'وارد کردن متن پیام الزامی است.',
            'message.min' => 'متن پیام باید حداقل ۱۰ کاراکتر باشد.',
        ];
    }

    public function sendMessage()
    {
        $user = auth()->user();
        if (!$user) {
            return redirect()
                ->route('website.login')
                ->with('error', 'برای ارسال پیام باید وارد حساب شوید.');
        }

        $this->validate([
            'message' => 'required|min:10',
        ]);

        $fullName = trim((string) ($user->name ?? ''));
        if ($fullName === '') {
            $fullName = trim((string) (($user->first_name ?? '') . ' ' . ($user->last_name ?? '')));
        }
        if ($fullName === '') {
            $fullName = 'کاربر سایت';
        }

        $senderEmail = trim((string) ($user->email ?? ''));
        $senderPhone = trim((string) ($user->number ?? '-'));
        $senderUsername = trim((string) ($user->username ?? '-'));

        $data = [
            'name' => $fullName,
            'email' => $senderEmail !== '' ? $senderEmail : '-',
            'phone' => $senderPhone !== '' ? $senderPhone : '-',
            'username' => $senderUsername !== '' ? $senderUsername : '-',
            'user_id' => (int) ($user->id ?? 0),
            'message' => trim((string) $this->message),
            'submitted_at' => now()->toDateTimeString(),
        ];

        $receiver = trim((string) config('mail.receiver', ''));
        if ($receiver === '') {
            $receiver = self::FALLBACK_RECEIVER_EMAIL;
        }

        if (!filter_var($receiver, FILTER_VALIDATE_EMAIL)) {
            return redirect()
                ->route('website.contact')
                ->with('error', 'ایمیل دریافت‌کننده تماس معتبر نیست.');
        }

        $mailer = (string) config('mail.default', 'log');
        if (in_array($mailer, ['log', 'array'], true)) {
            return redirect()
                ->route('website.contact')
                ->with('error', 'ارسال ایمیل واقعی فعال نیست. تنظیمات SMTP را در .env فعال کنید.');
        }

        if ($mailer === 'smtp') {
            $smtpUser = trim((string) config('mail.mailers.smtp.username', ''));
            $smtpPass = trim((string) config('mail.mailers.smtp.password', ''));

            if ($smtpUser === '' || $smtpPass === '') {
                return redirect()
                    ->route('website.contact')
                    ->with('error', 'SMTP ناقص است. لطفاً ایمیل و App Password جیمیل را تنظیم کنید.');
            }
        }

        try {
            Mail::to($receiver)->send(new ContactMessageMail($data));
        } catch (Throwable $e) {
            report($e);
            return redirect()
                ->route('website.contact')
                ->with('error', 'ارسال ایمیل انجام نشد. لطفاً تنظیمات SMTP را بررسی کنید.');
        }

        return redirect()
            ->route('website.contact')
            ->with('success', 'پیام شما با موفقیت ارسال شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'message',
        ]);

        $this->fillFromAuthenticatedUser();
        $this->resetValidation();
        $this->formKey = uniqid();
    }

    private function fillFromAuthenticatedUser(): void
    {
        $user = auth()->user();
        if (!$user) {
            $this->name = '';
            $this->email = '';
            return;
        }

        $fullName = trim((string) ($user->name ?? ''));
        if ($fullName === '') {
            $fullName = trim((string) (($user->first_name ?? '') . ' ' . ($user->last_name ?? '')));
        }

        $this->name = $fullName;
        $this->email = (string) ($user->email ?? '');
    }

    public function render()
    {
        return view('livewire.website.contact')->layout('livewire.website.layouts.app');
    }
}
