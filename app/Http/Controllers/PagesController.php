<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post, App\User;
use Image;

class PagesController extends Controller
{
    public function test(){
        return view('test');
        // $image = Image::make(file_get_contents('logo.png'))->resize(200, 200, function ($c) {
        //     $c->aspectRatio();
        //     $c->upsize();
        // });
        // $pic = $image->response();
    }

    public function contactme(Request $r){
        $this->validate($r, [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required',
            'message' => 'required'
        ]);
        contactMe($r->name, $r->email, $r->number, $r->message);
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

    public function publicchat(Request $r){
        return view('demo.publicchat');
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

    public function resetmypassword(){
        if(session()->has('resetpassword')) {
            if(session('resetpassword') == 1){
                return view('demo.resetpassword');
            }else{
                return "Something went wrong";
            }
        }else{
            return "Something went wrong";
        }
    }
}
