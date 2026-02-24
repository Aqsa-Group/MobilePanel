<?php

namespace App\Livewire\Website;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageMail;

class Contact extends Component
{
    public $name;
    public $email;
    public $message;
    public $formKey;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:10',
    ];


    protected function messages()
    {
        return [
            'name.required' => 'وارد کردن نام الزامی است.',
            'email.required' => 'وارد کردن ایمیل الزامی است.',
            'email.email' => 'فورمت ایمیل نادرست !',
            'message.required' => 'وارد کردن متن پیام الزامی است.',
        ];
    }
    public function sendMessage()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ];

        Mail::to(config('mail.receiver'))->send(
            new ContactMessageMail($data)
        );

        $this->resetForm();
    }
    public function resetForm()
    {
        $this->reset([
            'name',
            'email',
            'message',
        ]);
        $this->formKey = uniqid();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.website.contact')->layout('livewire.website.layouts.app');
    }
}
