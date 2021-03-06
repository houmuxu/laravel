@extends('common.home')

@section('title', $title)

@section('content')

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/home/js/script.js"></script>
		
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="/home/zhi/index">松鼠知</a></li>
							</ul>
						    
						</div>
			
			</div>
			<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">			 											
							<div class="searchAbout">
								<img src="/logo/1.jpg" height="320px" width="100%">
								<img src="/logo/2.jpg" height="320px" width="100%">
								<img src="/logo/3.jpg" height="320px" width="100%">

							</div>
							
							
                        </div>
				
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="#">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									
									@foreach($sales as $k=>$v)
										
										
									<li>
										<div class="i-pic limit">
											<a href="/home/show/{{$v->sid}}">
												<img src="
												 @php
									                  $sid = App\Model\Admin\Salespic::where('sid',$v->sid)->first();
									                  echo $salespic = $sid['salespic']; 
									                  
									              @endphp
												" />	
											</a>								
											<p class="title fl">{{$v->gname}}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>
													<del>{{$v->oldprice}}</del></strong>
											</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{$v->newprice}}</strong>
											</p>

											<p class="number fl">
												销量<span>{{$v->stock}}</span>
											</p>
										</div>
									</li>
										
									@endforeach
								</ul>

							</div>
							<div class="search-side">

								<div class="side-title">
									<strong>浪漫七夕</strong>
								</div>
<!-- 经典搭配另建表 -->
								<li>
									<div class="i-pic check" >
										<img src="/home/images/12.png" />
										<p class="check-title">
											<a href="/home/show/20">七夕送女朋友大礼包</a>
										</p>
										
										
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/home/images/13.jpg" />
										<p class="check-title">
											<a href="/home/goodsshow/110">甜蜜七夕</a>
										</p>
										
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/home/images/14.jpg" />
										<p class="check-title">
											<a href="/home/show/19">热辣七夕</a>
										</p>
										
									</div>
								</li>

								<li>
									<div class="i-pic check">
										<img src="/home/images/15.jpg" />
										<p class="check-title">
											<a href="/home/goodsshow/122">七夕大礼包</a>
										</p>
										
									</div>
								</li>

								<li>
									<div class="i-pic check">
										<img src="/home/images/10.png" />
										<p class="check-title">
											<a href="/home/goodsshow/84">爱豆七夕</a>
										</p>
										
									</div>
								</li>

							</div>
							<div class="clear"></div>
							<!--分页 -->
						

						</div>
					</div>
		
			@endsection