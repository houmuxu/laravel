@extends('common.geren')
@section('title', $title)


@section('content')




		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<style type="text/css">
			.dong{background-image: url(/home/images/sprite.png);background-position: -103px -135px;width: 19px;height: 19px;}
		</style>


		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong></div>
						</div>
						<hr/>
						<!--进度条-->
						<div class="m-progress">
							<div class="m-progress-list">
								<span class="step-1 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                   <p class="stage-name">未发货</p>
                                </span>
								<span class="step-2 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">2<em class="bgs @if($data[0]->status=='2'||$data[0]->status=='3') bg @endif"></em></i>
                                   <p class="stage-name">卖家发货</p>
                                </span>
								<span class="step-3 step">
                                   <em class="u-progress-stage-bg"></em>
                                   <i class="u-stage-icon-inner">3<em class="bg @if($data[0]->status=='3') dong @endif"></em></i>
                                   <p class="stage-name">确认收货</p>
                                </span>
								<span class="u-progress-placeholder"></span>
							</div>
							<div class="u-progress-bar total-steps-2">
								<div class="u-progress-bar-inner"></div>
							</div>
						</div>
						<div class="order-infoaside">
							<div class="order-addresslist" style="margin-left:170px">
								<div class="order-address">
									<div class="icon-add">
									</div>
									<p class="new-tit new-p-re">
										<span class="new-txt">{{$data[0]->oname}}</span>
										<span class="new-txt-rd2">{{$data[0]->tel}}</span>
									</p>
									<div class="new-mu_l2a new-p-re">
										<p class="new-mu_l2cw">
											<span class="title">收货地址：</span>
											<span class="province">{{$data[0]->addr}}</span>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="order-infomain">

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
									<td class="td-inner">商品操作</td>
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
								
								@foreach ($data as $k=>$v)
								<div class="order-status3">
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
														<a href="/home/goodsshow/{{$vv->gid}}" class="J_MakePoint">
															<img src="{{$vv->det_goodspic[0]->gpic}}" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="/home/goodsshow/{{$vv->gid}}">
																<p>{{$vv->det_goods->gname}}</p>
																<p class="info-little">
																	<br/>{{$vv->det_goods->goodsattr}} </p>
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
													</div>
												</li>
												<li class="td td-change">
													@if ($v->status ==1)
														<div class="am-btn am-btn-danger anniu">确认收货</div>
													@elseif ($v->status ==2)
														<div class="am-btn am-btn-danger anniu" onclick="bian(this,{{$v->id}})">确认收货</div>
													@elseif ($v->status ==3)
														<div class="am-btn am-btn-danger anniu">已签收</div>
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

				</div>
				<!--底部-->

				<script type="text/javascript">
					function bian(obj,id)
					{
						var str = confirm('您确定收货么？')
						if(str){
							$(obj).html('已签收');
							$(obj).removeAttr('onclick');
							$('.step-3 .u-stage-icon-inner .bg').attr('class','bg dong');
							$(obj).parents('.move-right').find('.mystatus1').html('已签收');

							$.get('/home/order/details_status',{id:id},function(data){
					        	// console.log(data);
			        			// if(data==1){alert('确认收货成功')}else{alert('确认收货失败')}
						    })
						}
						
					}
				</script>
@endsection