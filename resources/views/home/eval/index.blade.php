@extends('common.geren')
@section('title', $title)


@section('content')

		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/cmstyle.css" rel="stylesheet" type="text/css">

		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

		<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">评价管理</strong> / <small>Manage&nbsp;Comment</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有评价</a></li>
								<!-- <li><a href="#tab2">有图评价</a></li> -->

							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">

									<div class="comment-main">
										<div class="comment-list">
											<div class="comment-top">
													<div class="th th-price">
														<td class="td-inner">评价</td>
													</div>
													<div class="th th-item">
														<td class="td-inner">商品</td>
													</div>													
												</div>
										@foreach($evals as $k=>$v)
										@php
											$goods = App\Model\Admin\Goods::where('gid',$v->gid)->first();
										@endphp
											<ul class="item-list" style="margin-top: 40px">

												
												

												<li class="td td-item" >
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="{{$goods->goodspics[0]->gpic}}" class="itempic">
														</a>
													</div>
												</li>

												<li class="td td-comment">
													<div class="item-title">
														<div class="item-opinion">好评</div>
														<div class="item-name">
															<a href="/home/goodsshow/{{$goods->gid}}">
																<p class="item-basic-info">{{$goods->gname}}</p>
															</a>
														</div>
													</div>
													<div class="item-comment">
														{{$v->msg}}
													</div>

													<div class="item-info">
														<div>
															<p class="info-little">
															<span>口味：{{$goods->goodsattr}}</span>
															<span>评价：@if($v->rank == 1)
															 好评
															 @elseif($v->rank == 2)
															 中评
															 @elseif($v->rank == 3)
															 差评
															 @endif 
															</span> 
															</p>
															<p class="info-time">{{date('Y年m月d日 h:m',$v->uptime)}}</p>

														</div>
													</div>
												</li>

											</ul>
										@endforeach

										</div>
									</div>

								</div>
		
							</div>
						</div>

					</div>

				</div>
				<!--底部-->
			@endsection