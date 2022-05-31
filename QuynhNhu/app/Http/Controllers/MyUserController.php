<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use App\Models\User;
use DB;
use Mail;
use Session;
session_start();

class MyUserController extends Controller
{
    function login_user() {
        return view('/loginUser');
    }

    function register_user() {
        return view('/registerUser');
    }

    function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('index');
        }
        else{
            return Redirect::to('/loginUser')->send();
        }
    }

    function user_dang_nhap(Request $request) {
        $user_email = $request->email;
        $user_password = $request->password;
        $result = DB::table('users')->where('email',$user_email)
                                            ->where('password',$user_password)->first();
        if($result) {
            Session::put('username',$result->username);
            Session::put('id',$result->id);
            return Redirect::to('/');
        }
        else{
            Session::put('message','Mật khẩu hoặc tài khoản bị sai. Vui lòng nhập lại!');
            return Redirect::to('/loginUser');
        }
    }

    public function save_user(Request $request) {
        $data = array();
        $data['username'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;
        DB::table('users')->insert($data);
        //Session::put('message','ĐĂNG KÝ THÀNH CÔNG!');
        return Redirect::to('/loginUser');
    }

    function logout() {
        $this->AuthLogin();
        Session::put('username',null);
        Session::put('id',null);
        return Redirect::to('/loginUser');
    }


}
