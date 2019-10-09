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



Route::middleware(['auth'])->group(function () {
    Route::get('home', 'HomeController@getIndex')->name('home');
});
Route::get('/', function () {
    return view('welcome');
});
Route::get('register','RegisterController@register');
Route::post('register', 'RegisterController@checkRegister')->name('register');
Route::get('home/gioithieu', 'HomeController@gioithieu');
Route::get('login','LoginController@login');
Route::post('login', 'LoginController@checkLogin')->name('login');
Route::get('master', function () {
    return view('layouts.master');
});
Route::get('logout','HomeController@getLogout')->name('logout');


//Contents
//Danh sách content
Route::get('contents','ContentController@index')->name('contents.index');
//thêm mới content
Route::get('contents/create', 'ContentController@create')->name('contents.create');
//xử lý submit form khi thêm mới content
Route::post('contents/store', 'ContentController@store')->name('contents.store');
//xem chi tiết bảng content
Route::get('contents/detail/{id}', 'ContentController@show')->name('contents.show');
Route::get('contents/edit/{id}', 'ContentController@edit')->name('contents.edit');

//xử lý nút submit edit
Route::put('contents/edit/{id}', 'ContentController@update')->name('contents.edit');
//xử lý nút xóa
Route::get('contents/delete/{id}', 'ContentController@destroy')->name('contents.destroy');
