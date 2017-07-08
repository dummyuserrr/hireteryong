<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use App\Post;

class LikesController extends Controller
{
    public function toggleLike(Request $r){
    	$l = new Like;
    	$checkLike = $l->where('post_id', $r->postId)->where('user_id', session('id'))->first();
    	if($checkLike){
    		$checkLike->delete();
    		$p = new Post;
    		$post = $p->where('id', $r->id)->first();
    		return view('demo.postStats', compact('post'));
    	}else{
    		$l->user_id = session('id');
    		$l->post_id = $r->postId;
    		$p = new Post;
    		$post = $p->where('id', $r->id)->first(); 
    		return view('demo.postStats', compact('post'));
    	}
    }
}
