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
//Laravel Auth Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Admin Routes
Route::get('admin_register','AdminAuth\RegisterController@showRegistrationForm');
Route::post('admin_register','AdminAuth\RegisterController@register');

Route::get('/admin_home',function (){
   return view('admin.home');
});