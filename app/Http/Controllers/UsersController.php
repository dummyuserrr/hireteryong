<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function register(Request $r){
    	$this->validate($r, [
    		'fullname' => 'required',
    		'email' => 'required|unique:users|email',
    		'username' => 'required|unique:users',
    		'password' => 'required|min:6',
    		'password2' => 'required|same:password'
    	]);
    	$password = md5(hash('sha512', $r->password).hash('ripemd160', $r->password).md5("report mo pag nahack please"));
    	$u = new User;
    	$u->fullname = $r->fullname;
    	$u->email = $r->email;
    	$u->username = $r->username;
    	$u->password = $password;
        $u->verificationstatus = 'unverified';
    	$u->save();
        $verificationcode = md5(hash('sha512', $r->username).hash('ripemd160', $r->username).md5("verificationcode"));
        sendVerificationMail($u->email, $u->fullname, $verificationcode);
    	$this->setSession($u);
        return redirect('/demo');
    }

    public function login(Request $r){
    	$u = new User;
    	$password = md5(hash('sha512', $r->password).hash('ripemd160', $r->password).md5("report mo pag nahack please"));
        $username = $u->where('username', $r->username)->where('password', $password)->first();
        $email = $u->where('email', $r->username)->where('password', $password)->first();
        if($username || $email){
        	$this->setSession($username);
        	return "/demo";
        }else{
        	return "failed";
        }
    }

    public function setSession($u){
    	session()->put('status', 1);
        session()->put('id', $u->id);
    	session()->put('fullname', $u->fullname);
    	session()->put('username', $u->username);
        session()->put('verificationstatus', $u->verificationstatus);
    }

    public function verify(Request $r){
        $code = md5(hash('sha512', session('username')).hash('ripemd160', session('username')).md5("verificationcode"));
        if($r->c == $code){
            $u = new User;
            $user = $u->where('id', session('id'))->first();
            $user->update(['verificationstatus' => 'verified']);
            session()->put('verificationstatus', 'verified');
            echo "Your account has been verified!";
            return redirect('/demo');
        }else{
            return "Something went wrong";
        }
    }

    public function update(Request $r){
        // TODO: validate and return results, update db, and update session values
        // $this->validate($r, [
        //     'password' => 'required'
        // ]);
        // $photo = $r->file('photo')->store(md5(session('id'))."/profilepicture");
        // $u = new User;
        // $user = $u->where('id', session('id'))->first();
        // $user->update([
        //     'fullname' => $r->fullname,
        //     'username' => $r->username,
        //     'email' => $r->email,
        //     'password' => $r->password,
        //     'photo' => $photo
        // ]);
        return "Hahaha! This function is now working yet.";
    }

    public function sendpasswordresetlink(Request $r){
        $u = new User;
        $user = $u->where('email', $r->email)->first();
        if($user){
            $resetlink = md5(hash('sha512', $user->email).hash('ripemd160', $user->email).md5("passwordresetlink"));
            sendPasswordResetLink($user->email, $user->fullname, $resetlink);
            return "<br><center style='color:teal'>Password reset link sent. Please check your email.</center>";
        }else{
            return "<br><center style='color:red'>That email is not associated to any account. Please try again.</center>";
        }    }

    public function resetpassword(Request $r){
        $compare = md5(hash('sha512', $r->email).hash('ripemd160', $r->email).md5("passwordresetlink"));
        if($compare == $r->l){
            $u = new User;
            $user = $u->where('email', $r->email)->first();
            $this->setSession($user);
            session()->put('resetpassword', 1);
            return redirect('/demo/resetmypassword');
        }else{
            return "Something went wrong (compare)";
        }
    }

    public function logout(Request $r){
    	if($r->username == md5(session('username'))){
    		session()->flush();
    	}
    }
}
