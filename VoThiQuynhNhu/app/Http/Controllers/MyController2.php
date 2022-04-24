<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController2 extends Controller
{
    function index() {
        $products = Product::where('id','<',30)->get();
        $topSell = Product::where('manu_id','<',2)->get();
        return view('index',['topSelling'=>$topSell],['data'=>$products]);
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
