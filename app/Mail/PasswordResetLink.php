<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetLink extends Mailable
{
    use Queueable, SerializesModels;
    public $resetlink;
    public $fullname;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $fullname, $resetlink)
    {
        $this->resetlink = $resetlink;
        $this->fullname = $fullname;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.passwordresetlink', compact('fullname', 'resetlink', 'email'));
    }
}
