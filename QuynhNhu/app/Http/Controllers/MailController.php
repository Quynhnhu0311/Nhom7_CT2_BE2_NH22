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

class MailController extends Controller
{
    function quen_mat_khau() {

        return view('/forgot_pass');
    }

    function recover_pass(Request $request) {
        $data = $request->all();
        $title_mail = "Lấy lại mật khẩu";
        $customer = User::where('email','=',$data['email_account'])->get();
        foreach ($customer as $key => $value) {
            $customer_id = $value->id;
        }
        if($customer){
            $count_customer = $customer->count();
            if($count_customer == 0) {
                return redirect()->back()->with('error', 'Email chưa được đăng ký. Vui lòng nhập lại!');
            }else{
                $token_random = Str::random();
                $customer = User::find($customer_id);
                $customer->customer_token = $token_random;
                $customer->save();

                $to_email = $data['email_account'];
                $link_reset_pass = url('update-new-pass?email='.$to_email.'&token='.$token_random);
                $data = array("name"=>$title_mail,"body"=>$link_reset_pass,"email"=>$data['email_account']);

                Mail::send('/forgot_pass_notify', ['data'=>$data], function($message) use ($title_mail,$data){
                    $message->to($data['email'])->subject($title_mail);
                    $message->from($data['email'],$title_mail);
                });
                return redirect()->back()->with('error', 'Vui lòng vào Email để reset password!');
            }
        }
    }

    function update_new_pass() {
        return view('/new_pass');
    }

    function reset_new_pass(Request $request) {
        $data = $request->all();
        $token_random = Str::random();
        $customer = User::where('email','=',$data['email'])->where('customer_token','=',$data['token'])->get();
        $count = $customer->count();
        if($count > 0) {
            foreach ($customer as $key => $cus) {
                $customer_id = $cus->id;
            }
            $reset = User::find($customer_id);
            $reset->password = $data['password_account'];
            $reset->customer_token = $token_random;
            $reset->save();
            return redirect('loginUser')->with('success', 'Password được thay đổi thành công!');
        }else{
            return redirect('loginUser')->with('error', 'Password được thay đổi không thành công!');
        }
    }
}
