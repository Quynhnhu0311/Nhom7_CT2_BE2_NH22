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

Route::get('/', [MyController2::class,'index'])->name('homepage');
Route::get('/store/{type_id}', [MyController2::class,'store']);
Route::get('/product/{id}', [MyController2::class,'product']);
Route::post('/register', [MyController2::class,'register']);
