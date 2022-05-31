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
        return view('index');
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

}
