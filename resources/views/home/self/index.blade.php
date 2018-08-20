@extends('common.geren')
@section('title', $title)
@section('content')
		 @php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp
<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/systyle.css" rel="stylesheet" type="text/css">
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="/home/self">
											<img src="{{$res->upic}}">
										</a>
										<em class="s-name">(小叮当)<span class="vip1"></em>
										<div class="s-prestige am-btn am-round">
											</span>会员福利</div>
									</div>
									<div class="m-right">
										<div class="m-new">
											<a href="news.html"><i class="am-icon-bell-o"></i>消息</a>
										</div>
										<div class="m-address">
											<a href="address.html" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

								<!--个人资产-->
							
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="order.html">全部订单</a>
								</div>
								<ul>
									<li><a href="order.html"><i><img src="/home/images/pay.png"/></i><span>待付款</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/send.png"/></i><span>待发货<em class="m-num">1</em></span></a></li>
									<li><a href="order.html"><i><img src="/home/images/receive.png"/></i><span>待收货</span></a></li>
									<li><a href="order.html"><i><img src="/home/images/comment.png"/></i><span>待评价<em class="m-num">3</em></span></a></li>
									<li><a href="change.html"><i><img src="/home/images/refund.png"/></i><span>退换货</span></a></li>
								</ul>
							</div>
							<!--九宫格-->
							<div class="user-patternIcon">
								<div class="s-bar">
									<i class="s-icon"></i>我的常用
								</div>
								<ul>

									<a href="../home/shopcart.html"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="/home/images/iconbig.png"/><p>购物车</p></li></a>
									<a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="/home/images/iconsmall1.png"/><p>我的收藏</p></li></a>
									<a href="../home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="/home/images/iconsmall0.png"/><p>为你推荐</p></li></a>
									<a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="/home/images/iconsmall3.png"/><p>好评宝贝</p></li></a>
									<a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="/home/images/iconsmall2.png"/><p>我的足迹</p></li></a>                                                                        
								</ul>
							</div>
							<!--物流 -->
							<div class="m-logistics">

								
								<div class="s-content">
									

								</div>

							</div>

							<!--收藏夹 -->
							<div class="you-like">
								<div class="s-bar">我的收藏
									
								
								</div>
								<div class="s-content">
								@foreach($goods as $v)
									<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic">
												<a href="/home/goodsshow/{{$v->gid}}" class="s-pic-link">
													<img src="{{$v->goodspics[0]->gpic}}" alt="{{$v->gname}}" title="{{$v->gname}}" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price+3}}</em></span>

											</div>
											<div class="s-title"><a href="/home/goodsshow/{{$v->gid}}" title="{{$v->gname}}">{{$v->gname}}</a></div>
										
										</div>
									</div>
								@endforeach

								</div>

							

							</div>

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em>21</em>
									<span>星期一</span>
									<span>2015.12</span>
								</div>
							</div>
						</div>
						<!--新品 -->
						<div class="new-goods">
							
						
						</div>

						<!--热卖推荐 -->
						<div class="new-goods">
							<div class="s-bar">
								<i class="s-icon"></i>热卖推荐
							</div>
						@foreach($remen as $k=>$v)
							<div class="new-goods-info">
								<a class="shop-info" href="/home/goodsshow/{{$v->gid}}" target="_blank">
									<div >
										<img src="{{$v->goodspics[0]->gpic}}" alt="">
									</div>

                                    <span class="one-hot-goods">￥{{$v->price}}</span>
								</a>
							</div>
						@endforeach
						</div>

					</div>
				</div>
				<!--底部-->
@endsection