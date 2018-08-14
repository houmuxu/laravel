@extends('common.geren')
@section('title', $title)

		<link href="../AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="../AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="../css/personal.css" rel="stylesheet" type="text/css">
		<link href="../css/appstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>

		<!-- 弹窗 -->
        <link rel="stylesheet" href="/home/houtanchuang/message.css">
        <script src="/home/houtanchuang/message.min.js"></script>
        <style>
            /* 非组件样式 */
            .btn{
                margin-right:20px;
            }
            .p40{
                padding:40px;
            }
            .mt20{
                margin-top:20px;
            }
        </style>
@section('content')
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>
			@foreach($usergoods as $k=>$v)
				@if($v->status)
					@php
						continue;
					@endphp
				@endif
				<div class="comment-main">
							<div class="comment-list">
								<div class="item-pic">
										@php $goods = App\Model\Admin\Goods::where('gid',$v->gid)->first(); @endphp
									<a href="/home/goodsshow/{{$v->gid}}" class="J_MakePoint">
										<img src="{{$goods->goodspics[0]->gpic}}" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="/home/goodsshow/{{$v->gid}}">
											<p class="item-basic-info">{{$goods->gname}}</p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<span style="font-size: 5px">口味：{{$goods->goodsattr}}</span>
										</div>
										<div class="item-price">
											价格：<strong style="font-size: 5px">{{$goods->price}}元</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" class="textarea" gid='{{$goods->gid}}' did='{{$v->did}}'></textarea>
								</div>
						
								<div class="item-opinion">
									<li><i class="op1 active" rank="1"></i>好评</li>
									<li><i class="op2" rank="2"></i>中评</li>
									<li><i class="op3" rank="3"></i>差评</li>
								</div>
							</div>
							
						
								<div class="info-btn">
									<div class="am-btn am-btn-danger" onclick="store(this)">发表评论</div>
								</div>							
					<script type="text/javascript">
						$('.item-basic-info').hover(function(){
							$(this).css('color','red');
						},function(){
							$(this).css('color','');
						});
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {	
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");
								
							});
				     })
						
						
					</script>									
				</div>
			@endforeach
					</div>

				</div>

				<script type="text/javascript">
						function store(obj){

							var rank = $(obj).parent().prev().find('.active').attr('rank');
							var msg = $(obj).parent().prev().find('.textarea').val();
							var gid = $(obj).parent().prev().find('.textarea').attr('gid');
							var did = $(obj).parent().prev().find('.textarea').attr('did');
							var arr = [];
							arr[0] = gid;
							arr[1] = rank;
							if(msg == ''){
								msg = '用户无评论';
							}
							arr[2] = msg;

							$.get('/home/eval/store',{arr:arr,did:did},function(data){
								if(data){
									// 弹窗
				                    $.message('评论成功');

									$(obj).parent().prev().remove();

									$(obj).parent().remove();
								}
							});
						}
							
						
				</script>



				<!--底部-->
			@endsection