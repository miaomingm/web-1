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
Route::get('/info', function () {
    phpinfo();
});

Route::prefix("/user")->group(function(){
    //注册
    Route::get('reg','User\UserController@reg');//注册试图
    Route::any('regDo','User\UserController@regDo');//注册执行
    //登录
    Route::get('login','User\LoginController@login');//登录试图
    Route::any('loginDo','User\LoginController@loginDo');//执行登录
});
Route::prefix('/admin')->middleware('isLogin')->group(function(){
    Route::any('index','Admin\AdminController@index');
    Route::any('aa','Admin\AdminController@aa');
    Route::any('center','Admin\AdminController@center');
});

Route::get('/test1','TestController@test1');


