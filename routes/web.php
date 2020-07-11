<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'master'], function () {
    Voyager::routes();
});



Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function ()  {
    Route::get('home', 'AdminController@home')->name('admin.home');
    Route::get('findRoom', 'Admin\findRoomController@findRoom')->name('admin.findRoom');
    Route::post('findRoomHandle', 'Admin\findRoomController@findRoomHandle')->name('admin.findRoomHandle');
    
    Route::get('availableRooms', 'AdminController@availableRooms')->name('admin.availableRooms');
    Route::get('cart/add/{room}', 'Admin\CartController@add')->name('admin.cart.add');
    Route::get('cart/remove//{item}', 'Admin\CartController@remove')->name('admin.cart.remove');
    Route::get('checkout', 'Admin\CheckoutController@index')->name('admin.checkout.index');
    Route::get('rooms', 'Admin\RoomController@index')->name('admin.room.index');
    Route::get('room/{room}', 'Admin\RoomController@show')->name('admin.room.show');
    Route::get('room/{room}/edit', 'AdminController@editRoom')->name('admin.Edit');
    
    Route::resource('customer', 'Admin\CustomerController');
});




Route::resource('check', 'CheckController');




