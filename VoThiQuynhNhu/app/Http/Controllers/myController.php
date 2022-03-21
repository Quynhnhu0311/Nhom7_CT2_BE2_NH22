<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myController extends Controller
{
    function index() {
        return view('register');
    }

    function register(Request $request){
        $request->flash();
        echo $request->old('tname');
    }
}
