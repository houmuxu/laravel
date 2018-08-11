@extends('common.home') 

@section('title', $title)

@section('content')
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="/home/js/script.js"></script>
		<link rel="stylesheet" href="/home/layui/css/layui.css" media="all">
		
		
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
							<ul class="select">
								<p class="title font-normal">
									<span class="fl">{{$cate->cname}}</span>
									<span class="total fl">搜索到<strong class="num">{{$shu}}</strong>件相关商品</span>
								</p>
								<div class="clear"></div>
								<li class="select-result">
									<dl>
										<dt>已选</dt>
										<dd class="select-no"></dd>
										<p class="eliminateCriteria">清除</p>
									</dl>
								</li>
								<div class="clear"></div>

								<li class="select-list">
									<dl id="select2">
										<dt class="am-badge am-round">种类</dt>
										<div class="dd-conent">
											<dd class="select-all selected"><a href="#">全部</a></dd>
											@foreach($sub as $k=>$v)
											<dd><a href="/home/goodslist/{{$v->cid}}">{{$v->cname}}</a></dd>
											@endforeach
										</div>
									</dl>
								</li>
								
					        
							</ul>
							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合" href="/home/goodslistzhong/{{$cate->cid}}">综合排序</a></li>
									<li><a title="销量" href="/home/goodslistxiao/{{$cate->cid}}">销量排序</a></li>
									<li><a title="价格" href="/home/goodslistjia/{{$cate->cid}}">价格优先</a></li>
									<li class="big"><a title="评价" href="/home/goodslistping/{{$cate->cid}}">评价为主</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
									
									@foreach($goods as $k=>$v)
										
									@if($v->state == 2)
										@php
											continue;
										@endphp
									@endif
									<li>
										<div class="i-pic limit">
											<a href="/home/goodsshow/{{$v->gid}}">
												<img src="{{$v->goodspics[0]->gpic}}" />	
											</a>								
											<p class="title fl">{{$v->gname}}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{$v->price}}</strong>
											</p>
											<p class="number fl">
												销量<span>{{$v->num}}</span>
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
							@foreach($jingdian as $k=>$v)
								@if($v->state == 2)
									@php
										continue;
									@endphp
								@endif
								<li>
									<div class="i-pic check">
										<a href="/home/goodsshow/{{$v->gid}}">
										<img src="{{$v->goodspics[0]->gpic}}" />
										</a>								
										<p class="title fl">{{$v->gname}}</p>
										<p class="price fl">
											<b>¥</b>
											<strong>{{$v->price}}</strong>
										</p>
										<p class="number fl">
											销量<span>{{$v->num}}</span>
										</p>
									</div>
								</li>
							@endforeach
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
		
        <div id="test1">
        	{!!$goods->links()!!}
        </div>
       
        <script src="/home/layui/layui.js"></script>
		<script>
		layui.use('laypage', function(){
		  var laypage = layui.laypage;
		  
		  //执行一个laypage实例
		  laypage.render({
		    elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
		    ,count: 16//数据总数，从服务端得到
		    ,limit:12
		  });
		});
		</script>
      
			@endsection