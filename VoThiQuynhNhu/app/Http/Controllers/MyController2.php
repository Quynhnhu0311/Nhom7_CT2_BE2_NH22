<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protype;
use App\Models\Product;
use App\Models\Manufacture;

class MyController2 extends Controller
{
    function index() {
        $getAllProtype = Protype::orderBy('id','DESC')->get();
        $products = Product::where('id','<',30)->get();
        $topSelling = Product::where('manu_id','<',2)->get();
        return view('index',compact('getAllProtype','products','topSelling'));
    }

    function register(Request $request){
        $request->flash();
        $name = $request->tname;
        return view('output',['tname'=>$name]);
    }

    function store($id) {
        //$getAllProtype = Protype::orderBy('id','DESC')->get();
        $getProductByType = Product::where('type_id',$id)->get();
        return view('store',compact('getProductByType'));
    }

    function product($id) {
        $detailProduct = Product::where('id',$id)->get();
        return view('product', compact('detailProduct'));
    }
}
