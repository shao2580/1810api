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

// Route::get('/login1','User\UserController@login1');

Route::any('/curl','User\UserController@curl');		//发送请求

Route::get('/curl1','User\UserController@curl1');    //get  curl
Route::get('/curl2','User\UserController@curl2');    //get  curl  获取token
Route::post('/curl3','User\UserController@curl3');    //post  

Route::any('/login','User\UserController@login');     //测试 登录

Route::get('/encrypt','User\UserController@encrypt');     //测试 加密
Route::get('/encrypt1','User\UserController@encrypt1');     // 对称加密
