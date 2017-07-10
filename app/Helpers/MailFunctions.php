<?php
	use App\Mail\VerificationMail;
	use App\Mail\PasswordResetLink;
	use App\Mail\ContactMe;

	function sendVerificationMail($email, $fullname, $verificationcode){
        Mail::to($email)->queue(new VerificationMail($fullname, $verificationcode));
    }

    function sendPasswordResetLink($email, $fullname, $resetlink){
        Mail::to($email)->queue(new PasswordResetLink($email, $fullname, $resetlink));
    }

    function contactMe($name, $email, $number, $messageBody){
        Mail::to('dthrcrpz@gmail.com')->queue(new ContactMe($name, $email, $number, $messageBody));
    }