<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacture;
use App\Models\Protype;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class MyAdmin extends Controller
{
    function index() {
        return Redirect::to('/login');
    }

    function show_dashboard() {
        $this->AuthLogin();

        $product = DB::table('products')->get()->count();
        $protype = DB::table('protypes')->get()->count();
        $manufacture = DB::table('manufactures')->get()->count();
        $coupon = DB::table('coupons')->get()->count();

        return view('index')->with(compact('product','protype','manufacture','coupon'));
    }

    function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('index');
        }
        else{
            return Redirect::to('/login')->send();
        }
    }

    function dashboard(Request $request) {
        $admin_email = $request->email;
        $admin_password = $request->password;
        $result = DB::table('user_admin')->where('email',$admin_email)
                                            ->where('password',$admin_password)->first();
        if($result) {
            Session::put('username',$result->username);
            Session::put('id',$result->id);
            return Redirect::to('/index');
        }
        else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại!');
            return Redirect::to('/login');
        }
    }

    function logout() {
        $this->AuthLogin();
        Session::put('username',null);
        Session::put('id',null);
        return Redirect::to('/login');
    }

    public function save_admin(Request $request) {
        $data = array();
        $data['username'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        DB::table('user_admin')->insert($data);
        //Session::put('message','ĐĂNG KÝ THÀNH CÔNG!');
        return Redirect::to('/login');
    }

    function filter_by_date(Request $request) {
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = DB::table('statistical')->whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();

        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'order' => $val->total_order,
                'sales' => $val->sales,
                'profit' => $val->profit,
                'quantity' => $val->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }
}
