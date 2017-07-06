<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function demoIndex(){
    	return view('demo.index');
    }
}
