<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessageMail extends Mailable
{
    use SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        $subjectName = trim((string) data_get($this->data, 'name', 'کاربر سایت'));
        $subject = 'پیام تماس با ما - ' . ($subjectName !== '' ? $subjectName : 'کاربر سایت');

        $mail = $this->subject($subject)
            ->view('emails.contact-message')
            ->with([
                'data' => $this->data
            ]);

        $replyToEmail = trim((string) data_get($this->data, 'email', ''));
        if ($replyToEmail !== '' && filter_var($replyToEmail, FILTER_VALIDATE_EMAIL)) {
            $mail->replyTo($replyToEmail, $subjectName !== '' ? $subjectName : null);
        }

        return $mail;
    }
}
