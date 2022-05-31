<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Coupon;
use Cart;
use DB;
use Session;
session_start();

class CartController extends Controller
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

    function gio_hang(Request $request) {
        $this->AuthLogin();
        $meta_desc = "Giỏ hàng của bạn";
        $meta_keywords = "Giỏ hàng Ajax";
        $meta_title = "Giỏ hàng Ajax";
        $url_canonical = $request->url();
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        return view('viewcart')->with('type_product',$type_product)
                                ->with('manu_product',$manu_product)
                                ->with('meta_desc',$meta_desc)
                                ->with('meta_keywords',$meta_keywords)
                                ->with('meta_title',$meta_title)
                                ->with('url_canonical',$url_canonical);
    }

    public function add_cart_ajax(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart == true){
            $is_avaiable = 0;
            foreach($cart as $key => $value) {
                if($value['product_id'] == $data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_price' => $data['cart_product_price'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_price' => $data['cart_product_price'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
            );
            Session::put('cart',$cart);
        }
        Session::save();
    }

    function delete_product($session_id) {
        $this->AuthLogin();
        $cart = Session::get('cart');
        if($cart == true) {
            foreach($cart as $key => $val) {
                if($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Xóa sản phẩm thành công!');
        }
        else{
            return redirect()->back()->with('message','Xóa sản phẩm thất bại!');
        }
    }

    function delete_coupon() {
        $coupon = Session::get('coupon');
        if($coupon == true) {
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã thành công!');
        }
    }

    public function update_cart(Request $request) {
        $this->AuthLogin();
        $data = $request->all();
        $cart = Session::get('cart');
        if($cart == true){
            foreach($data['cart_qty'] as $key => $qty){
                foreach($cart as $session => $val){
                    if($val['session_id'] == $key){
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart',$cart);
            return redirect()->back()->with('message','Update số lượng thành công!');
        }
        else{
            return redirect()->back()->with('message','Update số lượng thất bại!');
        }
    }

    function check_coupon(Request $request) {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code',$data['coupon'])->first();
        if($coupon) {
            $coupon_count = $coupon->count();
            if($coupon_count > 0){
                $coupon_session = Session::get('coupon');
                if($coupon_session == true){
                    $is_avaiable = 0;
                    if($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_num,
                        );
                        Session::put('coupon',$cou);
                    }
                }else{
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_num,
                    );
                    Session::put('coupon',$cou);
                }
                Session::save();
                return redirect()->back()->with('message','Thêm mã giảm giá thành công!');
            }
        }
        else{
            return redirect()->back()->with('error','Mã giảm giá không đúng!');
        }
    }



}
