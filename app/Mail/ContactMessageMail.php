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
        return $this->view('emails.contact-message')
            ->with([
                'data' => $this->data
            ]);
    }
}
