<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Order;
use App\Models\Shipping;
use App\Models\DetailOrder;
use Cart;
use DB;
use Session;
use Mail;
session_start();

class CheckoutController extends Controller
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

    function confirm_order(Request $request) {
        $this->AuthLogin();
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();

        $data = $request->all();
        $shipping = new Shipping;
        $shipping->name = $data['shipping_name'];
        $shipping->email = $data['shipping_email'];
        $shipping->address = $data['shipping_address'];
        $shipping->phone = $data['shipping_phone'];
        $shipping->note = $data['shipping_note'];
        $shipping->save();
        $shipping_id = $shipping->id;
        $checkout_code = substr(md5(microtime()),rand(0,26),5);

        $order = new Order;
        $order->id_shipping = $shipping_id;
        $order->id_user = Session::get('id');
        $order->order_code = $checkout_code;
        $order->order_status = 1;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order['created_at'] = now();
        $order->save();

        if(Session::get('cart')){
            foreach(Session::get('cart') as $key => $cart){
                $order_detail = new DetailOrder;
                $order_detail->order_code = $checkout_code;
                $order_detail->id_SP = $cart['product_id'];
                $order_detail->product_name	 = $cart['product_name'];
                $order_detail->product_price = $cart['product_price'];
                $order_detail->product_qty = $cart['product_qty'];
                $order_detail->product_coupon = $data['order_coupon'];
                $order_detail->id_BH = "1";
                $order_detail->save();
            }
        }


    $title_mail = "Đơn hàng xác nhận";
    $customer = DB::table('users')->find(Session::get('id'));
    $data['email'][] = $customer->email;

    if(Session::get('cart')==true){
        foreach(Session::get('cart') as $key => $cart_mail){
            $cart_array[] = array(
                'product_name' => $cart_mail['product_name'],
                'product_price' => $cart_mail['product_price'],
                'product_qty' => $cart_mail['product_qty']

            );
        }
    }

    $shipping_array = array(
        'customer_name' => $customer->username,
        'shipping_name' => $data['shipping_name'],
        'shipping_email' => $data['shipping_email'],
        'shipping_phone' => $data['shipping_phone'],
        'shipping_address' => $data['shipping_address'],
        'shipping_note' => $data['shipping_note']
    );

    $ordercode_mail = array(
        //'coupon_code' => $coupon_mail,
        'order_code' => $checkout_code
    );

    Mail::send('mail_order', ['cart_array'=>$cart_array, 'shipping_array' => $shipping_array, 'code' => $ordercode_mail]
    , function($message) use ($title_mail,$data){
        $message->to($data['email'])->subject($title_mail);
        $message->from($data['email'],$title_mail);
    });


    $request->session()->forget(['cart']);
    $request->session()->forget(['coupon']);
    return view('/success')->with('type_product',$type_product)
                            ->with('manu_product',$manu_product);
    }

    function history() {
        $this->AuthLogin();
        if(!Session::get('id')){
            return redirect('loginUser')->with('error','Vui lòng đăng nhập để xem lịch sử đơn hàng!');
        }else{
            $type_product = DB::table('protypes')->orderby('id','desc')->get();
            $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
            $getOrder = DB::table('orders')->where('id_user',Session::get('id'))->orderby('id','DESC')->paginate(5);
            return view('history')->with('getOrder',$getOrder)
                                    ->with('type_product',$type_product)
                                    ->with('manu_product',$manu_product);
        }
    }

    function view_history_order($order_code) {
        $this->AuthLogin();
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();

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
        $coupon_prd = DB::table('coupons')->where('coupon_code',$coupon_code)->first();

        return view('view_history_order')->with('type_product',$type_product)
                                            ->with('manu_product',$manu_product)
                                            ->with('order_details',$order_details)
                                            ->with('customers',$customers)
                                            ->with('shippings',$shippings)
                                            ->with('coupon_prd',$coupon_prd);
    }

}
