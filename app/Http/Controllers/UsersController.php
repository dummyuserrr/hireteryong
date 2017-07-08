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
        // $verificationcode = md5(hash('sha512', $r->username).hash('ripemd160', $r->username).md5("protein is life"));
        // sendVerificationMail($u->email, $u->fullname, $verificationcode);
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
        $code = md5(hash('sha512', session('username')).hash('ripemd160', session('username')).md5("protein is life"));
        if($r->c == $code){
            $u = new User;
            $user = $u->where('id', session('id'))->first();
            $user->update(['verificationstatus' => 'verified']);
            session()->put('verificationstatus', 'verified');
            return "Your account has been verified!";
        }else{
            return "Something went wrong";
        }
    }

    public function logout(Request $r){
    	if($r->username == md5(session('username'))){
    		session()->flush();
    	}
    }
}
