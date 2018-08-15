@extends('common.geren')
@section('title', $title)


@section('content')


		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>


		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong>  <small></small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								
								<li><a href="#tab3">待发货</a></li>
								<li><a href="#tab4">待收货</a></li>
								<li><a href="#tab5">已签收</a></li>
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">小计</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">

											<!-- 所有订单 -->

											@foreach ($orders as $k=>$v)
											<div class="order-status5 shanchu1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i:s',$v->addtime)}} </span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														@foreach ($v->detailss as $kk=>$vv)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="
																		@if($vv->gid >= 30)
																			/home/goodsshow/{{$vv->gid}}
																		@else
																			/home/show/{{$vv->gid}}
																		@endif
																	" class="J_MakePoint">
																		<img src="
																			 @if($vv->gid >= 30)
																                {{$vv->det_goodspic[0]->gpic}}
																              @else
																                {{$vv->det_salespic[0]->salespic}}
																              @endif
																		" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="
																					@if($vv->gid >= 30)
																						/home/goodsshow/{{$vv->gid}}
																					@else
																						/home/show/{{$vv->gid}}
																					@endif	
																				">
																			<p>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->gname}}
																	            @else
																	                {{$vv->det_sales->gname}}
																	            @endif
																			</p>
																			<p class="info-little">
																				<br/>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->goodsattr}} 
																	            @else
																	                {{$vv->det_sales->goodsattr}}
																	            @endif
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	{{$vv->cnt*$vv->price}}
																</div>
															</li>
														</ul>
														@endforeach

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->sum}}
																<p>含运费：<span>免邮</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus mystatus1">@if($v->status==1)未发货@elseif($v->status==2)已发货@elseif($v->status==3)已签收@elseif($v->status==4)已取消@endif</p>
																	<p class="order-info"><a href="/home/order/details/{{$v->oid}}">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
															@if ($v->status ==1)
																<div class="am-btn am-btn-danger anniu">确认收货</div>
															@elseif ($v->status ==2)
																<div class="am-btn am-btn-danger anniu" onclick="bian(this,{{$v->id}})">确认收货</div>
															@else
																<div class="am-btn am-btn-danger anniu" onclick="bian(this,{{$v->id}})">删除订单</div>
															@endif
															</li>
														</div>
													</div>
												</div>
											</div>
											@endforeach


										</div>

									</div>

								</div>
								
								<!-- 待发货 -->
								<div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">小计</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
									
									@foreach($daifahuo as $k=>$v)
									<div class="order-main">
										<div class="order-list">
											<div class="order-status2">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i:s',$v->addtime)}} </span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														@foreach ($v->detailss as $kk=>$vv)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="
																		@if($vv->gid >= 30)
																			/home/goodsshow/{{$vv->gid}}
																		@else
																			/home/show/{{$vv->gid}}
																		@endif
																	" class="J_MakePoint">
																		<img src="
																			 @if($vv->gid >= 30)
																                {{$vv->det_goodspic[0]->gpic}}
																              @else
																                {{$vv->det_salespic[0]->salespic}}
																              @endif
																		" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="
																					@if($vv->gid >= 30)
																						/home/goodsshow/{{$vv->gid}}
																					@else
																						/home/show/{{$vv->gid}}
																					@endif
																		">
																			<p>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->gname}}
																	            @else
																	                {{$vv->det_sales->gname}}
																	            @endif
																			</p>
																			<p class="info-little">
																				<br/>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->goodsattr}} 
																	            @else
																	                {{$vv->det_sales->goodsattr}}
																	            @endif
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span> {{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">{{$vv->price*$vv->cnt}}</a>
																</div>
															</li>
														</ul>
														@endforeach

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->sum}}
																<p>含运费：<span>免邮</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">未发货</p>
																	<p class="order-info"><a href="/home/order/details/{{$v->oid}}">订单详情</a></p>
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu">
																	未发货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endforeach

								</div>
								
								<!-- 待收货 -->
								<div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">小计</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>
									
									<div class="order-main">
										<div class="order-list">
										@foreach ($daishouhuo as $k=>$v)
											<div class="order-status3 shanchu1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i:s',$v->addtime)}} </span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														@foreach ($v->detailss as $kk=>$vv)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="
																		@if($vv->gid >= 30)
																			/home/goodsshow/{{$vv->gid}}
																		@else
																			/home/show/{{$vv->gid}}
																		@endif
																	" class="J_MakePoint">
																		<img src="
																			 @if($vv->gid >= 30)
																                {{$vv->det_goodspic[0]->gpic}}
																              @else
																                {{$vv->det_salespic[0]->salespic}}
																              @endif
																		" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="
																					@if($vv->gid >= 30)
																						/home/goodsshow/{{$vv->gid}}
																					@else
																						/home/show/{{$vv->gid}}
																					@endif
																		">
																			<p>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->gname}}
																	            @else
																	                {{$vv->det_sales->gname}}
																	            @endif
																			</p>
																			<p class="info-little">
																				<br/>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->goodsattr}} 
																	            @else
																	                {{$vv->det_sales->goodsattr}}
																	            @endif
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span> {{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	{{$vv->price*$vv->cnt}}
																</div>
															</li>
														</ul>
														@endforeach
													
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->sum}}
																<p>含运费：<span>免邮</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus mystatus1">卖家已发货</p>
																	<p class="order-info"><a href="/home/order/details/{{$v->oid}}">订单详情</a></p>
																	
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu" onclick="bian(this,{{$v->id}})">确认收货</div>
															</li>
														</div>
													</div>
												</div>
											</div>
										@endforeach

										</div>
									</div>
									
								</div>
								
								<!-- 已签收 -->
								<div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">小计</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
										@foreach ($yiqianshou as $k=>$v)
											<div class="order-status3 shanchu1">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->oid}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i:s',$v->addtime)}} </span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">

														@foreach ($v->detailss as $kk=>$vv)
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="
																		@if($vv->gid >= 30)
																			/home/goodsshow/{{$vv->gid}}
																		@else
																			/home/show/{{$vv->gid}}
																		@endif
																	" class="J_MakePoint">
																		<img src="
																			 @if($vv->gid >= 30)
																                {{$vv->det_goodspic[0]->gpic}}
																              @else
																                {{$vv->det_salespic[0]->salespic}}
																              @endif
																		" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="
																					@if($vv->gid >= 30)
																						/home/goodsshow/{{$vv->gid}}
																					@else
																						/home/show/{{$vv->gid}}
																					@endif
																		">
																			<p>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->gname}}
																	            @else
																	                {{$vv->det_sales->gname}}
																	            @endif
																			</p>
																			<p class="info-little">
																				<br/>
																				@if($vv->gid >= 30)
																	                {{$vv->det_goods->goodsattr}} 
																	            @else
																	                {{$vv->det_sales->goodsattr}}
																	            @endif
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$vv->price}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span> {{$vv->cnt}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	{{$vv->price*$vv->cnt}}
																</div>
															</li>
														</ul>
														@endforeach
													
													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：{{$v->sum}}
																<p>含运费：<span>免邮</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus mystatus1">已签收</p>
																	<p class="order-info"><a href="/home/order/details/{{$v->oid}}">订单详情</a></p>
																	
																</div>
															</li>
															<li class="td td-change">
																<div class="am-btn am-btn-danger anniu" onclick="bian(this,{{$v->id}})">删除订单</div>
															</li>
														</div>
													</div>
												</div>
											</div>
										@endforeach

										</div>
									</div>

								</div>

							</div>

						</div>
					</div>
				</div>
				<!--底部-->
	<script type="text/javascript">
		function bian(obj,id)
		{
			var bian = $(obj).html();
			if(bian=='确认收货'){
				
				var str = confirm('您确定收货么？')
				if(str){
					$(obj).html('删除订单');
					$(obj).parents('.shanchu1').find('.mystatus1').html('已签收')

					$.get('/home/order/status',{id:id},function(data){
			        	// console.log(data);
			        	// if(data==1){alert('确认收货成功')}else{alert('确认收货失败')}
				    })
				}

			} else {
				var str = confirm('确定删除么？')
				if(str){
				  	//删除
			        $(obj).parents('.shanchu1').remove();

			        $.get('/home/order/del',{id:id},function(data){
			        	// console.log(data);
			        	// if(data==1){alert('删除成功')}else{alert('删除失败')}
			        })
				}
			}
		}
	</script>

@endsection
