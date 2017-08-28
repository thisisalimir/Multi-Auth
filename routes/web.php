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
//Home Page
Route::get('/', function () {
    return view('welcome');
});
//Laravel User Register Routes
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['admin_guest']], function () {
    //Admin Routes
    Route::get('admin_register', 'AdminAuth\RegisterController@showRegistrationForm');
    Route::post('admin_register', 'AdminAuth\RegisterController@register');
    //Login
    Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('admin_login', 'AdminAuth\LoginController@login');
});

Route::group(['middleware' => ['admin_auth']], function () {

    //Logout
    Route::post('admin_logout', 'AdminAuth\LoginController@logout');

    Route::get('/admin_home', function () {
        return view('admin.home');
    });
});
