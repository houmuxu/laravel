<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>@yield('title')</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<!-- <link href="/home/css/personal.css" rel="stylesheet" type="text/css"> -->
		<!-- <link href="/home/css/systyle.css" rel="stylesheet" type="text/css"> -->
	</head>
		@php
     	  $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp
	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
							<div class="menu-hd">
							@if(session('uname')==null)
							<a href="/user/login" target="_top" class="h">亲，请登录</a>
							<a href="/user/zhuce" target="_top">免费注册</a>
							@elseif(session('uname')!==null)
							您好
							<b> {{$res->uname}} </b> | 
							<a href="/user/logout" target="_top">退出</a>
							@endif
							</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="/home/self" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="/home/cart" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="/home/coll/index" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>
						<!--悬浮搜索框-->
						<div class="nav white">
							<div class="logoBig">
								<li><img src="/home/images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form action="/home/goods/where">
									<input id="searchInput" name="gname" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
                                <li class="qc"><a href="/home/sales">活动商品</a></li>
                                <li class="qc"><a href="/home/sales">活动</a></li>
                                <li class="qc last"><a href="/home/zhi/index">松鼠知</a></li>
							</ul>

						</div>
			</div>
			<b class="line"></b>
@section('content')

@show
<div class="footer">
					<div class="footer-hd">
						<p>
							@foreach($links as $k=>$v)
								<a href="{{$v->furl}}">{{$v->fname}}</a>
								<b>|</b>
							@endforeach
							
						</p>
					</div>
				
				</div>

			</div>

			<aside class="menu">
				<ul>
					<li class="person active">
						<a href="/home/self">个人中心</a>
					</li>
					<li class="person">
						<p>个人资料</p>
						<ul>
							<li> <a href="/home/self/userinfo">个人信息</a></li>
							<li> <a href="/home/self/usersafety">安全设置</a></li>
						</ul>
					</li>
					<li class="person">
						<a>我的交易</a>
						<ul>

							<li><a href="/home/order/index">订单管理</a></li>
							<li> <a href="/home/address/index">收货地址</a></li>

						</ul>
					</li>

					<li class="person">
						<a>我的小窝</a>
						<ul>
							<li> <a href="/home/coll/index">收藏</a></li>
							<li> <a href="/home/zuji">足迹</a></li>
							<li> <a href="/home/eval/make">未评价</a></li>
							<li> <a href="/home/eval/list">已评价</a></li>
							<li> <a href="/home/goods/email">更换邮箱</a></li>
							<li> <a href="/home/tel/index">更换手机号</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
		<!--引导 -->
	
	</body>

</html>