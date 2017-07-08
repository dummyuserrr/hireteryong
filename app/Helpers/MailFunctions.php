<?php
	use App\Mail\VerificationMail;

	function sendVerificationMail($email, $fullname, $verificationcode){
        Mail::to($email)->queue(new VerificationMail($fullname, $verificationcode));
    }