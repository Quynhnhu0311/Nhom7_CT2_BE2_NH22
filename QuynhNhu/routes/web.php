<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController2;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProtypeController;
use App\Http\Controllers\MyUserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CheckoutController;


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

Route::any('/', [MyController2::class,'index'])->name('homepage');
Route::get('/register', [MyController2::class,'register']);
Route::get('/searchProduct', [MyController2::class,'search']);
Route::get('/checkout', [MyController2::class,'checkout']);


//Protype & Product

Route::get('/danh-muc-san-pham/{id}', [ProtypeController::class,'show_protype']);
Route::get('/chi-tiet-san-pham/{id}', [ProductController::class,'detail_product']);
Route::post('/load-comment', [ProductController::class,'load_comment']);
Route::post('/send-comment', [ProductController::class,'send_comment']);
Route::post('/insert-rating', [ProductController::class,'insert_rating']);


//User
Route::get('/loginUser', [MyUserController::class,'login_user']);
Route::get('/registerUser', [MyUserController::class,'register_user']);
Route::post('/user-dang-nhap', [MyUserController::class,'user_dang_nhap']);
Route::get('/logout', [MyUserController::class,'logout']);
Route::post('/save-user', [MyUserController::class,'save_user']);

//MAIL
Route::get('/quen-mat-khau', [MailController::class,'quen_mat_khau']);
Route::get('/update-new-pass', [MailController::class,'update_new_pass']);
Route::post('/reset-new-pass', [MailController::class,'reset_new_pass']);
Route::post('/recover-pass', [MailController::class,'recover_pass']);


//CART
Route::get('/gio-hang', [CartController::class,'gio_hang']);
Route::post('/add-cart-ajax', [CartController::class,'add_cart_ajax']);
Route::post('/update-cart', [CartController::class,'update_cart']);
Route::get('/delete-product/{session_id}', [CartController::class,'delete_product']);
Route::get('/delete-coupon', [CartController::class,'delete_coupon']);

//CHECKOUT
Route::post('/confirm-order', [CheckoutController::class,'confirm_order']);

//COUPON
Route::post('/check-coupon', [CartController::class,'check_coupon']);

//ODERS
Route::get('/history', [CheckoutController::class,'history']);
Route::get('/view-history-order/{order_code}', [CheckoutController::class,'view_history_order']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
