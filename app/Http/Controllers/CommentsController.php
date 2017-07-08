<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function addcomment(Request $r){
    	$c = new Comment;
    	if(session()->has('status')){
    		$c->user_id = session('id');
    		$c->post_id = $r->postId;
    		$c->body = $r->body;
    		$c->save();
    		return view('demo.commentToPrepend', compact('c'));
    	}else{
    		$c->post_id = $r->postId;
    		$c->body = $r->body;
    		$c->save();
    		return view('demo.commentToPrepend', compact('c'));
    	}
    }

    public function loadcomments(Request $r){
        $c = new Comment;
        $comments = $c->where('post_id', $r->postId)->orderBy('created_at', 'desc')->get();
        return view('demo.comments', compact('comments'));
    }
}
