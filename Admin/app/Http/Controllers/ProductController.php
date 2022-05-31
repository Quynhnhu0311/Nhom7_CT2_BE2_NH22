<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Protype;
use App\Models\Manufacture;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class ProductController extends Controller
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

    function products() {
        $this->AuthLogin();
        $getProducts = Product::all();
        return view('products')->with('getProducts',$getProducts);
    }

    public function add_product() {
        $this->AuthLogin();
        $getProtypes = DB::table('protypes')->get();
        $getManufactures = DB::table('manufactures')->get();
        return view('addproduct')->with('getProtypes',$getProtypes)
                                    ->with('getManufactures',$getManufactures);
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->add_name;
        $data['manu_id'] = $request->add_manu;
        $data['type_id'] = $request->add_type;
        $data['price'] = $request->add_price;
        $data['discription'] = $request->add_discrip;
        $data['discount'] = $request->add_discount;
        $get_image = $request->file('add_product_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./img/',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message','THÊM THÀNH CÔNG!');
            return Redirect::to('addproduct');
        }
        $data['image'] = '';
        DB::table('products')->insert($data);
        Session::put('message','THÊM THÀNH CÔNG!');
        return Redirect::to('addproduct');
    }

    public function edit_product($id) {
        $this->AuthLogin();
        $type_product = DB::table('protypes')->orderby('id','desc')->get();
        $manu_product = DB::table('manufactures')->orderby('id','desc')->get();
        $edit_product = DB::table('products')->where('id',$id)->get();
        $manager_Product = view('edit_product')->with('edit_product',$edit_product)
                                                ->with('type_product',$type_product)
                                                ->with('manu_product',$manu_product);
        return view('masterAdmin')->with('edit_product',$manager_Product);
    }

    public function update_product(Request $request, $id) {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->name;
        $data['manu_id'] = $request->manu;
        $data['type_id'] = $request->type;
        $data['price'] = $request->price;
        $data['discription'] = $request->discrip;
        $data['discount'] = $request->discount;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./img/',$new_image);
            $data['image'] = $new_image;
            DB::table('products')->where('id',$id)->update($data);
            Session::put('message','THÊM THÀNH CÔNG!');
            return Redirect::to('products');
        }
        DB::table('products')->where('id',$id)->update($data);
        Session::put('message','THÊM THÀNH CÔNG!');
        return Redirect::to('products');
    }

    public function delete_product($id) {
        $this->AuthLogin();
        DB::table('products')->where('id',$id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('products');
    }
}
