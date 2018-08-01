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

//后台
Route::group([],function(){
	//后台首页
	Route::any('/admin/first','admin\UserController@first');

	//商品管理
	Route::resource('/admin/goods','admin\GoodsController');

	// 类别管理  zhang
	Route::resource('/admin/cate', 'admin\CateController');


});

//前台
Route::any('/', 'home\FirstController@index');
Route::group([],function(){

});