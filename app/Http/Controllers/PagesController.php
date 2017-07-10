<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post, App\User;

class PagesController extends Controller
{
    public function test(){
        return view('test');
    }

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

    public function myaccount(Request $r){
        if(session()->has('status')){
            $u = new User;
            $user = $u->find(session('id'));
            return view('demo.myaccount', compact('user'));
        }else{
            return view('errors.notloggedin');
        }
    }

    public function editaccount(){
        if(session()->has('status')){
            $u = new User;
            $user = $u->find(session('id'));
            return view('demo.editaccount', compact('user'));
        }else{
            return view('errors.notloggedin');
        }
    }
}
