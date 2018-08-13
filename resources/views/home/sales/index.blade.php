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
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    
						</div>
			
			</div>
			<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<img src="/logo/1.jpg" height="320px">
								<img src="/logo/2.jpg" height="320px">
								<img src="/logo/3.jpg" height="320px">

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
									经典搭配
								</div>
<!-- 经典搭配另建表 -->
								<li>
									<div class="i-pic check">
										<img src="/home/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/home/images/cp2.jpg" />
										<p class="check-title">ZEK 原味海苔</p>
										<p class="price fl">
											<b>¥</b>
											<strong>8.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="/home/images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>

							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								<li class="am-disabled"><a href="#">&laquo;</a></li>
								<li class="am-active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li>
							

							</ul>

						</div>
					</div>
		
        
       
        
      
			@endsection