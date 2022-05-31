<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\DetailOrder;

class OrderController extends Controller
{
    function list_orders() {
        $order = DB::table('orders')->orderby('created_at','DESC')->get();
        return view('oders')->with(compact('order'));
    }

    function view_orders($order_code) {
        $order_details = DB::table('detail_orders')->where('order_code',$order_code)->get();
        $order = DB::table('orders')->where('order_code',$order_code)->get();

        foreach($order as $key => $ord) {
            $customer_id = $ord->id_user;
            $shipping_id = $ord->id_shipping;
        }

        $customers = DB::table('users')->where('id',$customer_id)->get();
        $shippings = DB::table('shippings')->where('id',$shipping_id)->get();

        foreach($order_details as $key => $order_d){
            $coupon_code = $order_d->product_coupon;
        }

        $coupon = DB::table('coupons')->where('coupon_code',$coupon_code)->first();
        $coupon_condition = $coupon->coupon_condition;
        $coupon_number = $coupon->coupon_num;

        return view('view_oders')->with(compact('order_details','customers','shippings','coupon_condition','coupon_number'));
    }
}
