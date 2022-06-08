<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
use DB;
use Session;
session_start();

class CouponController extends Controller
{
    function insert_coupon() {
        return view('/insert_coupon');
    }

    function insert_coupon_code(Request $request) {
        $data = $request->all();
        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_num = $data['coupon_num'];
        $coupon->coupon_code = $data['coupon_code'];

        $coupon->save();

        return Redirect::to('list-coupon');
    }

    function list_coupon() {
        $coupons = DB::table('coupons')->orderby('id','DESC')->get();
        return view('/list_coupon')->with(compact('coupons'));
    }

    function delete_coupon($id) {
        DB::table('coupons')->where('id',$id)->delete();
        return Redirect::to('list-coupon');
    }
}
