<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyAdmin;
use App\Http\Controllers\ProtypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Admin
Route::get('/', [MyAdmin::class,'index'])->name('login');
Route::get('/index', [MyAdmin::class,'show_dashboard'])->name('home');
Route::post('/admin-dashboard', [MyAdmin::class,'dashboard']);
Route::get('/logout', [MyAdmin::class,'logout']);
Route::post('/save-admin', [MyAdmin::class,'save_admin']);

//Protype
Route::get('/protypes', [ProtypeController::class,'protype'])->name('viewTypeList');
Route::get('/addprotype', [ProtypeController::class,'add_protype']);
Route::post('/save-protype', [ProtypeController::class,'save_protype']);
Route::post('/update-protype/{id}', [ProtypeController::class,'update_protype']);
Route::get('/edit-protype/{id}', [ProtypeController::class,'edit_protype']);
Route::get('/delete-protype/{id}', [ProtypeController::class,'delete_protype']);

//Product
Route::get('/products', [ProductController::class,'products'])->name('viewProductList');
Route::get('/addproduct', [ProductController::class,'add_product']);
Route::post('/save-product', [ProductController::class,'save_product']);
Route::post('/update-product/{id}', [ProductController::class,'update_product']);
Route::get('/edit-product/{id}', [ProductController::class,'edit_product']);
Route::get('/delete-product/{id}', [ProductController::class,'delete_product']);

//Manufacture
Route::get('/manufactures', [ManufactureController::class,'manufacture'])->name('viewManuList');
Route::get('/addmanufacture', [ManufactureController::class,'add_manufacture']);
Route::post('/save-manufacture', [ManufactureController::class,'save_manufacture']);
Route::post('/update-manufacture/{id}', [ManufactureController::class,'update_manufacture']);
Route::get('/edit-manufacture/{id}', [ManufactureController::class,'edit_manufacture']);
Route::get('/delete-manufacture/{id}', [ManufactureController::class,'delete_manufacture']);

//Coupon
Route::get('/list-coupon', [CouponController::class,'list_coupon']);
Route::get('/insert-coupon', [CouponController::class,'insert_coupon']);
Route::post('/insert-coupon-code', [CouponController::class,'insert_coupon_code']);
Route::get('/delete-coupon/{id}', [CouponController::class,'delete_coupon']);

//ORDERS
Route::get('/list-orders', [OrderController::class,'list_orders']);
Route::get('/view-orders/{order_code}', [OrderController::class,'view_orders']);
Route::post('/update-cart', [OrderController::class,'update_cart']);

//USERS
Route::get('/list-user', [UserController::class,'list_user']);
Route::get('/delete-user/{id}', [UserController::class,'delete_user']);

//CHART
Route::post('/filter-by-date', [MyAdmin::class,'filter_by_date']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
