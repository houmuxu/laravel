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
	//轮播图管理 hou
	Route::resource('/admin/lunbo','admin\LunboController');

	// 类别管理  zhang
	Route::resource('/admin/cate', 'admin\CateController');



	//后台订单---资源路由---(yang)
	Route::resource('/admin/orders','admin\OrdersController');
	//发货ajax
	Route::any('/send','admin\OrdersajaxController@send');
	//订单详情
	Route::any('/admin/details/index/{oid}','admin\DetailsController@show');
	//订单详情修改页
	Route::any('/admin/details/edit/{id}','admin\DetailsController@edit');
	Route::any('/admin/details/update/{id}','admin\DetailsController@update');



	//  友情链接   zhang
	Route::resource('/admin/friendlink', 'admin\FriendlinkController');





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
	//个人中心邮箱验证hou
	Route::any('/home/goods/email','home\GoodsController@email');//换绑email页面
	Route::any('/home/goods/useremail','home\GoodsController@useremail');//验证email
	Route::any('/home/goods/emailjihuo','home\GoodsController@emailjihuo');//激活新的email

	//购物车 
	Route::any('/home/cartc','home\CartController@store');

	//  购物车页面  zhang
	Route::any('/home/cart','home\CartController@index');    // 购物车页面
	Route::any('/home/cart/del','home\CartController@del');//购物车商品删除
	Route::any('/home/cart/incre','home\CartController@incre');//商品数量加1
	Route::any('/home/cart/decre','home\CartController@decre');//商品数量减1


	//  个人中心页面
	Route::any('/home/self','home\SelfController@index');   //  个人中心页面







});