<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMe extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $number;
    public $messageBody;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $number, $messageBody)
    {
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
        $this->messageBody = $messageBody;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contactmemessage', compact('name', 'email', 'number', 'messageBody'));
    }
}
