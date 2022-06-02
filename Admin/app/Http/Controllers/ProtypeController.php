<?php

namespace App\Http\Controllers;
use App\Models\Protype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class ProtypeController extends Controller
{
    function AuthLogin() {
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('index');
        }
        else{
            return Redirect::to('/login')->send();
        }
    }

    public function add_protype() {
        $this->AuthLogin();
        return view('addprotype');
    }

    function protype() {
        $this->AuthLogin();
        $getType = Protype::all();
        return view('protypes')->with('getType',$getType);
    }

    public function edit_protype($id) {
        $this->AuthLogin();
        $edit_protype = DB::table('protypes')->where('id',$id)->get();
        $all_Protype = view('edit_protype')->with('edit_protype',$edit_protype);
        return view('masterAdmin')->with('edit_protype',$all_Protype);
    }

    public function update_protype(Request $request, $id) {
        $this->AuthLogin();
        $data = array();
        $data['type_name'] = $request->typename;
        $data['qty'] = $request->soluong;
        DB::table('protypes')->where('id',$id)->update($data);
        return Redirect::to('protypes');
    }

    public function delete_protype($id) {
        $this->AuthLogin();

        $coupon = DB::table('coupons')->where('coupon_code',$order->order_code)->first();
        $coupon->coupon_time = $coupon->coupon_time - 1;
        $coupon->save();

        DB::table('protypes')->where('id',$id)->delete();
        Session::put('message','Xóa danh mục thành công');
        return Redirect::to('protypes');
    }

    public function save_protype(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['type_name'] = $request->typename;
        $data['qty'] = $request->soluong;
        DB::table('protypes')->insert($data);
        Session::put('message','THÊM THÀNH CÔNG!');
        return Redirect::to('addprotype');
    }
}
