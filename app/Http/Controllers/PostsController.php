<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function add(Request $r){
    	$this->validate($r, [
    		'body' => 'required'
    	]);

    	$p = new Post;
    	if(session()->has('status')){
    		$p->user_id = session('id');
    		$p->body = $r->body;
    		$p->save();
            $post = $p;
            return view('demo.postToPrepend', compact('post'));
    	}else{
    		$p->body = $r->body;
    		$p->save();
            $post = $p;
            return view('demo.postToPrepend', compact('post'));
    	}
    }
}
