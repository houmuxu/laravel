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
	Route::any('/admin/goodss/status','admin\GoodssController@status');//修改状态
	Route::any('/admin/goodss/del','admin\GoodssController@destroy');//删除商品
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



	//  首页 hou
	Route::any('/', 'home\FirstController@index');

	//  注册页面
	// Route::any('/login', 'home\HomeController@login');
//前台
Route::group([],function(){
	//用户手机注册
	Route::resource('/user/zhuce','home\UserController');
		//发送验证码
	Route::any('/sendcode','home\UserController@sendcode');
		//检验验证码
	Route::any('/checkcode','home\UserController@checkcode');






	//商品管理 hou
	Route::any('/home/goodslist/{id}','home\GoodsController@index');//商品列表页
	Route::any('/home/goodslistxiao/{id}','home\GoodsController@xiaoliang');//商品列表按销量查
	Route::any('/home/goodslistzhong/{id}','home\GoodsController@zhonghe');//商品列表按综合查
	Route::any('/home/goodslistjia/{id}','home\GoodsController@jiage');//商品列表按价格查
	Route::any('/home/goodslistping/{id}','home\GoodsController@pingjia');//商品列表按价格查
	Route::any('/home/goods/where','home\GoodsController@where');//搜索商品列表页
	Route::any('/home/goods/wherexiao/{id}','home\GoodsController@wherexiao');//搜索商品按销量查
	Route::any('/home/goods/wherejia/{id}','home\GoodsController@wherejia');//搜索商品按价格查
	Route::any('/home/goods/wherezhong/{id}','home\GoodsController@wherezhong');//搜索商品按综合查
	Route::any('/home/goodsshow/{id}','home\GoodsController@show');//商品详情页
	//个人中心邮箱验证hou
	Route::any('/home/goods/email','home\GoodsController@email');//换绑email页面
	Route::any('/home/goods/useremail','home\GoodsController@useremail');//验证email
	Route::any('/home/goods/emailjihuo','home\GoodsController@emailjihuo');//激活新的email


	//加入购物车 
	Route::any('/home/cartc','home\CartController@store');
	//立即购买
	Route::any('/home/cartinfo','home\GoodsController@cartinfo');


	//  促销商品  zhang
	Route::any('/home/sales', 'home\SalesController@index');
	Route::any('/home/show/{id}', 'home\SalesController@show');
	//  促销商品添加购物车
	Route::any('/home/cartadd','home\CartController@cartadd');

	//购物车 
	Route::any('/home/cartc','home\CartController@store');
	


	//  购物车页面  zhang
	Route::any('/home/cart','home\CartController@index');    // 购物车页面
	Route::any('/home/cart/del','home\CartController@del');//购物车商品删除
	Route::any('/home/ajaxcart','home\CartController@ajaxcart');
	


	//  个人中心页面
	Route::any('/home/self','home\SelfController@index');   //  个人中心页面


	//我的小窝hou
	Route::any('/home/eval/make','admin\EvalController@make');  //待评价页面
	Route::any('/home/eval/store','admin\EvalController@store');  //评价内容入库
	Route::any('/home/eval/list','admin\EvalController@index');  //已评价页面
	Route::any('/home/coll/store','home\CollController@store');  //收藏存入DB
	Route::any('/home/coll/index','home\CollController@index');  //我的收藏页面
	Route::any('/home/tel/index','home\CollController@telindex');  //更换手机号页面
	






	// 个人中心 之 我的交易
	Route::any('/home/order/index','home\MydealController@index');//订单管理
	Route::any('/home/order/del','home\MydealController@delete');//前台订单删除
	Route::any('/home/order/status','home\MydealController@status');//ajax确认收货
	Route::any('/home/order/details/{oid}','home\MydealController@details');//前台订单详情
	Route::any('/home/order/details_status','home\MydealController@details_status');//ajax订单详情确认收货

	Route::any('/home/address/index','home\MydealController@address');//个人中心地址管理
	Route::any('/home/address/store','home\MydealController@store');
	Route::any('/home/address/edit/{id}','home\MydealController@edit');//地址修改
	Route::any('/home/address/update/{id}','home\MydealController@update');
	Route::any('/home/address/del','home\MydealController@del');//地址删除

	// 立即购买
	Route::any('/home/balance_one','home\BalanceController@indexone');
	Route::any('/home/balance_createone','home\BalanceController@createone');//收货信息添加页
	Route::any('/home/balance_storeone','home\BalanceController@storeone');
	Route::any('/home/balance_editone/{id}','home\BalanceController@editone');//收货信息修改页
	Route::any('/home/balance_updateone/{id}','home\BalanceController@updateone');
	Route::any('/home/balance_delone','home\BalanceController@delete');//收货信息删除


	// 结算页
	Route::any('/home/balance','home\BalanceController@index');//结算主页面
	Route::any('/home/balance_create','home\BalanceController@create');//收货信息添加页
	Route::any('/home/balance_store','home\BalanceController@store');
	Route::any('/home/balance_edit/{id}','home\BalanceController@edit');//收货信息修改页
	Route::any('/home/balance_update/{id}','home\BalanceController@update');
	Route::any('/home/balance_del','home\BalanceController@delete');//收货信息删除

	// 订单、订单详情 存入数据库
	Route::any('/home/balance_order','home\BalanceController@order');

	// 支付成功页
	Route::any('/home/pay_ok','home\BalanceController@payok');//收货信息删除


	

	










});








// hou redis test
//redis测试
Route::get('testRedis','RedisController@testRedis')->name('testRedis');
