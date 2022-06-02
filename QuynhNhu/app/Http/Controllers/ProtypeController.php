<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;

class ProtypeController extends Controller
{
    function show_protype($id) {
        //$min_price = Product::min('price');
        $min_price = DB::table('products')->min('price');
        $max_price = DB::table('products')->max('price');
        $min_price_range = 5000000;
        $max_price_range = 5000000;

        if(isset($_GET['start_price']) && $_GET['end_price']){
            $min_price = $_GET['start_price'];
            $max_price = $_GET['end_price'];

            $type_by_id = DB::table('products')->join('protypes','products.type_id','=','protypes.id')->whereBetween('price',[$min_price,$max_price])->orderBy('price','ASC')
                            ->get();
        }else{
            $type_by_id = DB::table('products')->join('protypes','products.type_id','=','protypes.id')
                                            ->where('products.type_id',$id)->get();
        }

        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        $type_qty = DB::table('protypes')->get()->count();
        $manu_qty = DB::table('manufactures')->get()->count();


        //$type_by_id_product = Product::with('protypes')->where('type_id',$id)->orderBy('id','DESC');

        $topSell = DB::table('products')->where('id','<',5)->get();

        $detail_product = DB::table('products')->join('protypes','protypes.id','=','products.type_id')
                                                ->join('manufactures','manufactures.id','=','products.manu_id')
                                                ->where('products.id',$id)->get();
        foreach($detail_product as $key => $value) {
            $type_id = $value->id;
        }
        $related_product = DB::table('products')->join('protypes','protypes.id','=','products.type_id')
                                                ->join('manufactures','manufactures.id','=','products.manu_id')
                                                ->where('protypes.id',$type_id)->get();
        return view('store')->with('type_product',$type_product)
                                ->with('manu_product',$manu_product)
                                ->with('type_by_id',$type_by_id)
                                ->with('topSell',$topSell)
                                ->with('min_price',$min_price)
                                ->with('max_price',$max_price)
                                ->with('max_price_range',$max_price_range)
                                ->with('min_price_range',$min_price_range)
                                ->with('type_qty',$type_qty)
                                ->with('manu_qty',$manu_qty);
    }

}
