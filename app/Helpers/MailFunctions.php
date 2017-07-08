<?php
	function sendVerificationMail($email, $fullname){
        Mail::to($email)->queue(new WelcomeMail($fullname));
    }