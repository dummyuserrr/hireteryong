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
    	return $r->all();
    }
}
