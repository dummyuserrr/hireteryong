<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class ChatsController extends Controller
{
    public function send(Request $r){
    	$this->validate($r, [
    		'message' => 'required'
    	]);
    	
    	$c = new Chat;
    	if(session()->has('status')){
    		$c->user_id = session('id');
    	}
    	$c->body = $r->message;
    	$c->save();

    	return view('demo.chatToAppend', compact('c'));
    }
}
