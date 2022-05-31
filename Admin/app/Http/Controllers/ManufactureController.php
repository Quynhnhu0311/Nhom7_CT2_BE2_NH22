<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Manufacture;
use DB;
use Session;
session_start();

class ManufactureController extends Controller
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

    function manufacture() {
        $this->AuthLogin();
        $getManu = Manufacture::all();
        return view('manufactures')->with('getManu',$getManu);
    }

    public function add_manufacture() {
        $this->AuthLogin();
        return view('addmanufacture');
    }

    public function save_manufacture(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['manu_name'] = $request->manu_name;
        $data['qty'] = $request->soluong;
        DB::table('manufactures')->insert($data);
        Session::put('message','THÊM THÀNH CÔNG!');
        return Redirect::to('addmanufacture');
    }

    public function edit_manufacture($id) {
        $this->AuthLogin();
        $edit_manufacture = DB::table('manufactures')->where('id',$id)->get();
        $all_Manufacture = view('edit_manufacture')->with('edit_manufacture',$edit_manufacture);
        return view('masterAdmin')->with('edit_manufacture',$all_Manufacture);
    }

    public function update_manufacture(Request $request, $id) {
        $this->AuthLogin();
        $data = array();
        $data['manu_name'] = $request->manuname;
        $data['qty'] = $request->soluong;
        DB::table('manufactures')->where('id',$id)->update($data);
        return Redirect::to('manufactures');
    }

    public function delete_manufacture($id) {
        $this->AuthLogin();
        DB::table('manufactures')->where('id',$id)->delete();
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect::to('manufactures');
    }
}
