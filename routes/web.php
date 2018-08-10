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
	Route::any('/admin/lunbo/create','admin\LunboController@create');//添加轮播页面
	Route::any('/admin/lunbo/store','admin\LunboController@store');//添加轮播
	Route::any('/admin/lunbo/index','admin\LunboController@index');//轮播列表
	Route::any('/admin/lunbo/status','admin\LunboController@status');//轮播状态管理
	Route::any('/admin/lunbo/edit/{id}','admin\LunboController@edit');//轮播修改页面
	Route::any('/admin/lunbo/update/{id}','admin\LunboController@update');//轮播修改
	Route::any('/admin/lunbo/delete','admin\LunboController@delete');//轮播单条删除
	Route::any('/admin/lunbo/ajaxdel','admin\LunboController@ajaxdel');//轮播多条删除


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

	//  促销商品    zhang
	Route::resource('/admin/sales', 'admin\SalesController');





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
	Route::any('/home/goodslist','home\GoodsController@where');//搜索商品列表页
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
	Route::any('/home/ajaxcart','home\CartController@ajaxcart');
	


	//  个人中心页面
	Route::any('/home/self','home\SelfController@index');   //  个人中心页面

	//结算页
	Route::any('/home/balance','home\BalanceController@index');//结算主页面
	Route::any('/home/balance_create','home\BalanceController@create');//收货信息添加页
	Route::any('/home/balance_store','home\BalanceController@store');
	Route::any('/home/balance_edit/{id}','home\BalanceController@edit');//收货信息修改页
	Route::any('/home/balance_update/{id}','home\BalanceController@update');
	Route::any('/home/balance_del','home\BalanceController@delete');//收货信息删除

	Route::any('/home/balance_order','home\BalanceController@order');//订单信息存入

	//支付成功页
	Route::any('/home/pay_ok','home\BalanceController@payok');//收货信息删除

	//订单管理
	Route::any('/person/order','home\MydealController@index');//个人中心订单










});