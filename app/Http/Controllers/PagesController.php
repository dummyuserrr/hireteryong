<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function demoIndex(){
    	return view('demo.index');
    }

    public function homepage(Request $r){
        return view('demo.demohomepage');
    }

    public function posts(Request $r){
        $p = new Post;
        $posts = $p->orderBy('created_at', 'desc')->get();
    	return view('demo.posts', compact('posts'));
    }
}
