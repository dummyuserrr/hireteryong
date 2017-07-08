<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $fullname;
    public $verificationcode;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fullname, $verificationcode)
    {
        $this->fullname = $fullname;
        $this->verificationcode = $verificationcode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.verification', compact('fullname', 'verificationcode'));
    }
}
