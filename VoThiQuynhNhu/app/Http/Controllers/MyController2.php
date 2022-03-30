<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController2 extends Controller
{
    function index() {
        return view('index');
    }

    function register(Request $request){
        $request->flash();
        $name = $request->tname;
        return view('output',['tname'=>$name]);
    }
    
    function store() {
        return view('store');
    }
}
