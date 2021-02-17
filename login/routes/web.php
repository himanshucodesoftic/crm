<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\UserController;
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
    return view('master');
});


Route::get('/registration', function () {
    return view('registration');
});
Route::get('/user-login', function () {
    return view('user-login');
});


Route::get('/edit', function () {
    return view('edit');
});
Route::get('user-registration', 'App\Http\Controllers\UserController@index');

Route::post('user-store', 'App\Http\Controllers\UserController@userPostRegistration');

Route::get('user-login', 'App\Http\Controllers\UserController@userLoginIndex');

Route::post('login/{id}', 'App\Http\Controllers\UserController@userPostLogin');

Route::get('dashboard', 'App\Http\Controllers\UserController@dashboard');

Route::get('logout', 'App\Http\Controllers\UserController@logout');
// Route::view('dashboard',"dashboard");

// Route::get('/edit','App\Http\Controllers\UserController@edit');
Route::post('/edit/{pbcid}','App\Http\Controllers\UserController@edit');


Route::get('change-password', 'App\Http\Controllers\ChangePassword\Controller@index');
Route::post('change-password', 'App\Http\Controllers\ChangePasswordController@store')->name('change.password');
Route::view('login','login');

// Route::view('editpage','edtpage');

Route::get('/editpage/{pbcid}', 'App\Http\Controllers\UserController@admin_product_detail');

Route::post('/admin/update_product/{pbcid}', 'App\Http\Controllers\UserController@update_product');




//Route::post('/email_available/check', 'App\Http\Controllers\EmailAvailable@check')->name('username.check');

Route::post('/registration/check', 'App\Http\Controllers\UserController@check')->name('registration.check');


Route::get('/listpage/{pbcid}', 'App\Http\Controllers\UserController@show');

Route::view('listpage','listpage');

Route::post('/destroy/{id}','App\Http\Controllers\UserController@destroy');
