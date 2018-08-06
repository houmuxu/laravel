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
//  首页
Route::any('/', 'home\FirstController@index');

//  注册页面
// Route::any('/login', 'home\HomeController@login');

Route::group([],function(){
	//用户手机注册
	Route::resource('/user/zhuce','home\UserController');
		//发送验证码
	Route::any('/sendcode','home\UserController@sendcode');
		//检验验证码
	Route::any('/checkcode','home\UserController@checkcode');






	//商品管理 hou
	Route::any('/home/goodslist/{id}','home\GoodsController@index');//商品列表页
	Route::any('/home/goodsshow/{id}','home\GoodsController@show');//商品详情页
	//购物车 hou
	Route::any('/home/cartc','home\CartController@store');
	Route::any('/home/cart','home\CartController@index');
	Route::any('/home/cart/del','home\CartController@del');








});