<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/', 'App\Http\Controllers\UserController@index');
Route::get('/cart', 'App\Http\Controllers\UserController@cart');
Route::get('/products', 'App\Http\Controllers\UserController@products');
Route::get('/checkout', 'App\Http\Controllers\UserController@checkout');
Route::get('/receipt', 'App\Http\Controllers\UserController@receipt');
Route::get('/order-status', 'App\Http\Controllers\UserController@orderStatus');
Route::get('/product', 'App\Http\Controllers\UserController@product');
Route::post('/addtocart/{id}', 'App\Http\Controllers\UserController@addtocart');
Route::post('/remove/{id}', 'App\Http\Controllers\UserController@remove');
Route::post('/addreview/{id}', 'App\Http\Controllers\UserController@addreview');
Route::get('/search', 'App\Http\Controllers\UserController@search');
Route::post('/search', 'App\Http\Controllers\UserController@results');
Route::get('/updatecart', 'App\Http\Controllers\UserController@updatecart');
Route::get('/makeorder', 'App\Http\Controllers\UserController@makeorder');
Route::get('/profile', 'App\Http\Controllers\UserController@profile');


Route::get('/auth/signin',[MainController::class, 'signin'])->name('auth.signin');
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');
Route::post('/auth/save',[MainController::class, 'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class, 'check'])->name('auth.check');


// Route::get('/user/signin','App\Http\Controllers\MainController@signin') ->name('user.signin');
// Route::get('/user/signin',[MainController::class,'signin']) ->name('user.signin');
// Route::post('/user/save','App\Http\Controllers\MainController@save') ->name('user.save');
// Route::post('/user/save',[MainController::class,'save'])->name('user.save');
// Route::post('/user/check','App\Http\Controllers\MainController@check') ->name('user.check');
// Route::post('/user/check',[MainController::class,'check'])->name('user.check');



