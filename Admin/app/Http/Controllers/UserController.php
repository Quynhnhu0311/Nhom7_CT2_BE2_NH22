<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use DB;
use Session;
session_start();

class UserController extends Controller
{
    function list_user() {
        $getUser = DB::table('users')->get();
        return view('users')->with('getUser',$getUser);
    }

    function delete_user($id) {
        DB::table('users')->where('id',$id)->delete();
        Session::put('message','Xóa người dùng thành công!');
        return Redirect::to('list-user');
    }
}
