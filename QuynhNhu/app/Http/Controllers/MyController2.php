<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Protype;
use App\Models\Product;
use App\Models\Manufacture;
use App\Models\Rating;
use Session;
use DB;

class MyController2 extends Controller
{
    function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('index');
        }
        else{
            return Redirect::to('/loginUser')->send();
        }
    }

    function index() {
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        $products = Product::where('id','<',30)->get();
        $topSelling = Product::where('manu_id','<',2)->get();
        return view('index')->with('type_product',$type_product)
                            ->with('manu_product',$manu_product)
                            ->with('products',$products)
                            ->with('topSelling',$topSelling);
    }

    function register(Request $request){
        $request->flash();
        $name = $request->tname;
        return view('output',['tname'=>$name]);
    }

    function search(Request $req){
        $search = $req->input('key');
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        $topSell = DB::table('products')->where('id','<',5)->get();

        if($search != ""){
            $searchProduct = Product::where(function($query) use($search){
                $query->where('name','like','%'.$search.'%')
                        ->orWhere('price','like','%'.$search.'%');
            })->paginate(4);
            $searchProduct->appends(['key' => $search]);
        }
        else{
            $searchProduct = Product::paginate(4);
        }

        return view('search')->with('data',$searchProduct)
                                ->with('type_product',$type_product)
                                ->with('manu_product',$manu_product)
                                ->with('topSell',$topSell);
    }

    function checkout() {
        $this->AuthLogin();
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        return view('checkout')->with('type_product',$type_product)
                                ->with('manu_product',$manu_product);
    }

    function check_out() {
        return view('check_out');
    }

}
