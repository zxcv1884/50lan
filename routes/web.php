<?php

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
Route::get('orders/finish','OrdersController@finish');
Route::resource('orders','OrdersController');
Route::resource('drinks', 'DrinksController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
//Route::resource('all', 'ALLController');
Route::resource('edit-types', 'EditTypesController');
Route::resource('edit-drinks', 'EditDrinksController');
Route::get('orders.finish/{id}','OrdersController@finish')->name('orders.finish');
Route::get('orders.edit-order-drinks/{id}','OrdersController@edit_order_drinks')->name('orders.edit-order-drinks');
Route::put('orders.update-order-drinks/{id}','OrdersController@update_order_drinks')->name('orders.update-order-drinks');
Route::get('orders.all','OrdersController@all')->name('orders.all');