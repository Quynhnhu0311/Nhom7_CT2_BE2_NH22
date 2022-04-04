<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\myController;
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

Route::get('/', [myController::class,'index']);
Route::get('/store', [MyController2::class,'store']);
Route::get('/product', [MyController2::class,'product']);
Route::post('/register', [myController::class,'register']);
