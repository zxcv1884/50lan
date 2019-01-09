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
Route::get('serve/finish','OrderController@finish');
Route::resource('serve','OrderController');
Route::resource('drinks', 'drinksController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});
Route::resource('all', 'ALLController');
Route::resource('edit-types', 'EditTypesController');
Route::resource('edit-drinks', 'EditDrinksController');
Route::get('server.finish/{id}','OrderController@finish')->name('serve.finish');