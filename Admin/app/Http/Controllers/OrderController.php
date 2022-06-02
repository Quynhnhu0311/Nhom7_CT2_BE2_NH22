<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\DetailOrder;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Statistic;
use App\Models\Product;
use Carbon\Carbon;

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
        $coupon_prd = DB::table('coupons')->where('coupon_code',$coupon_code)->first();

        $coupon_condition = $coupon_prd->coupon_condition;
        $coupon_number = $coupon_prd->coupon_num;

        return view('view_oders')->with('order_details',$order_details)
                                            ->with('customers',$customers)
                                            ->with('shippings',$shippings)
                                            ->with('coupon_prd',$coupon_prd)
                                            ->with('coupon_condition',$coupon_condition)
                                            ->with('coupon_number',$coupon_number)
                                            ->with('order',$order);
    }

    function update_cart(Request $request) {
        $data = $request->all();

        $order_stt = Order::find($data['order_id']);
        $order_stt->order_status = $data['order_status'];
        $order_stt->save();

        $order_date = $order_stt->created_at;
        $statistic = Statistic::where('order_date',$order_date)->get();
        if($statistic){
            $statistic_count = $statistic->count();
        }else{
            $statistic_count = 0;
        }
        if($order_stt->order_status == 2){
            $total_order = 0;
            $sales = 0;
            $profit = 0;
            $quantity = 0;
            foreach($data['order_product_id'] as $key => $product_id){
                $product = Product::find($product_id);
                $product_price = $product->price;
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                foreach($data['quantity'] as $key2 => $qty){
                    if($key==$key2){
                        $quantity+=$qty;
                        $total_order+=1;
                        $sales+=$product_price*$qty;
                        $profit = $sales-1000;
                    }
                }
            }
            if($statistic_count>0){
                $statistic_update = Statistic::where('order_date',$order_date)->first();
                $statistic_update->sales = $statistic_update->sales + $sales;
                $statistic_update->profit = $statistic_update->profit + $profit;
                $statistic_update->quantity = $statistic_update->quantity + $quantity;
                $statistic_update->total_order = $statistic_update->total_order + $total_order;
                $statistic_update->save();
            }else{
                $statistic_new = new Statistic();
                $statistic_new->order_date = $order_date;
                $statistic_new->sales = $sales;
                $statistic_new->profit = $profit;
                $statistic_new->quantity = $quantity;
                $statistic_new->total_order = $total_order;
                $statistic_new->save();
            }
        }
    }
}
