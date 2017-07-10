<?php
	use App\Mail\VerificationMail;
	use App\Mail\PasswordResetLink;

	function sendVerificationMail($email, $fullname, $verificationcode){
        Mail::to($email)->queue(new VerificationMail($fullname, $verificationcode));
    }

    function sendPasswordResetLink($email, $fullname, $resetlink){
        Mail::to($email)->queue(new PasswordResetLink($email, $fullname, $resetlink));
    }