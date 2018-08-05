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
	//后台首页zhao
	Route::any('/admin/first','admin\FistUserController@first');
	//管理员 
	Route::resource('/admin/admin','admin\AdminController');
	Route::any('/admin/adminall','admin\AdminController@del');
	Route::any('/admin/adminsta/{id}','admin\AdminController@start');
	Route::any('/admin/adminclo/{id}','admin\AdminController@close');
	//用户
	Route::resource('/admin/user','admin\UserController');
	
	
	

	//商品管理 hou
	Route::resource('/admin/goods','admin\GoodsController');

	// 类别管理  zhang
	Route::resource('/admin/cate', 'admin\CateController');






});

//前台
Route::any('/', 'home\FirstController@index');
Route::group([],function(){






	//商品管理 hou
	Route::any('/home/goodslist/{id}','home\GoodsController@index');//商品列表页
	Route::any('/home/goodsshow/{id}','home\GoodsController@show');//商品详情页
	//购物车 hou
	Route::any('/home/cartc','home\CartController@store');





});