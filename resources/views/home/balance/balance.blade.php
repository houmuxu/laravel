@extends('common.home')

@section('title', $title)

@section('content')
		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/address.js"></script>
		
		<!-- 主体内容 -->
		<div class="concent">

			<!--地址 -->
			<div class="paycont">
				<!-- 添加收货地址 -->
				<div class="address">
					<h3>确认收货地址 </h3>
					<div class="control">
						<a href="/home/balance_create" class="tc-btn createAddr am-btn am-btn-danger">创建新地址</a href="/home/balances">
					</div>
					<div class="clear"></div>
				
					<ul>
						@foreach ($data as $k=>$v)
							<li onclick="xinxi(this)" class="user-addresslist">
								<div class="address-left">
									<div class="user">
										<span class="buy-address-detail">   
	               							<span class="buy-user"> {{$v->oname}} </span>
										<span class="buy-phone"> {{$v->tel}} </span>
										</span>
									</div>
									<div class="default-address">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
									   		{{$v->addr}}
										</span>
									</div>
								</div>
								<div class="address-right">
									<a href="/home/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>
								<div class="new-addr-btn">
									<span class="new-addr-bar hidden">|</span>
									<a href="/home/balance_edit/{{$v->id}}" class=''>编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0)"  onclick="delClick(this,{{$v->id}})">删除</a>
								</div>
							</li>
						@endforeach
					</ul>
					<div class="clear"></div>
				</div>
				<!-- 添加地址结束 -->
			</div>

			<!--订单 -->
			<div class="concent">
				<div id="payTable">
					<h3>确认订单信息</h3>

					<div class="cart-table-th">
						<div class="wp">

							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-oplist">
								<div class="td-inner">配送方式</div>
							</div>

						</div>
					</div>
					<div class="clear"></div>
					
					@foreach ($res as $k=>$v)
						<tr class="item-list">
							<div class="bundle  bundle-last">
								<div class="bundle-main">
									<ul class="item-content clearfix">
										<div class="pay-phone">
											<li class="td td-item">
												<div class="item-pic">
													<a href="
														@if($v->gid >= 30)
															/home/goodsshow/{{$v->gid}}
														@else
															/home/show/{{$v->gid}}
														@endif
															" class="J_MakePoint">
														<!-- <img src="/home/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"> -->
														<img src="
														@if($v->gid >= 30)
															@php
															$gid = App\Model\Admin\Goodspic::where('gid',$v->gid)->first();
			            									echo $gpic = $gid->gpic;
															@endphp
														@else
															@php
															$sid = App\Model\Admin\Salespic::where('sid',$v->gid)->first();
			            									echo $salespic = $sid->salespic;
															@endphp
														@endif
														" class="itempic J_ItemImg" width="78px">
													</a>
												</div>
												<div class="item-info">
													<div class="item-basic-info">
														<a href="
															@if($v->gid >= 30)
																/home/goodsshow/{{$v->gid}}
															@else
																/home/show/{{$v->gid}}
															@endif
														" class="item-title J_MakePoint" data-point="tbcart.8.11"><strong>{{$v->gname}}</strong></a>
														<input class="gid" type="hidden" value="{{$v->gid}}" />
													</div>
												</div>
											</li>
											<li class="td td-info">
												<div class="item-props">
													<span class="sku-line">口味：{{$v->goodsattr}}</span>
												</div>
											</li>
											<li class="td td-price">
												<div class="item-price price-promo-promo">
													<div class="price-content">
														<em class="J_Price price-now">{{$v->price}}</em>
													</div>
												</div>
											</li>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="decre" type="button" value="-" />
															<input readonly class="text_box" name="" type="text" value="{{$v->num}}" style="width:30px;" />
															<input class="add am-btn" name="incre" type="button" value="+" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number">{{$v->price*$v->num}}</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														包邮
													</div>
												</div>
											</li>
										</div>
									</ul>
									<div class="clear"></div>
								</div>
							</div>
						</tr>
						<div class="clear"></div>
					@endforeach
	
					<!--留言 含运费小计 最后信息-->
					<div class="pay-total">
						<!--留言-->
						<div class="order-extra">
							<div class="order-user-info">
								<div id="holyshit257" class="memo">
									<label>买家留言：</label>
									<input type="text" name="msg" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
									<div class="msg hidden J-msg">
										<p class="error">最多输入500个字符</p>
									</div>
								</div>
							</div>
						</div>

						<!--含运费小计 -->
						<div class="buy-point-discharge ">
							<p class="price g_price ">
								合计（含运费） <span>¥</span><em class="pay-sum">0.00</em>
							</p>
						</div>

						<!--最后收货信息 -->
						<div class="order-go clearfix">
							<div class="pay-confirm clearfix">
								<div class="box">
									<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
										<span class="price g_price ">
                                		<span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">0.00</em>
										</span>
									</div>

									<div id="holyshit268" class="pay-address">

										<p class="buy-footer-address">
											<span class="buy-line-title buy-line-title-type">寄送至：</span>
											<span class="sku-line buy--address-detail jisongzhi">
							   					点击上方地址,选择您的收货地址
											</span>
											
										</p>
										<p class="buy-footer-address">
											<span class="buy-line-title">收货人：</span>
											<span class="sku-line buy-address-detail shouhuoren">   
                                     			点击上方地址,选择收货人
											</span>
											<span class="sku-line buy-address-detail shoujihao">手机号</span>
										</p>
									</div>
								</div>

								<div id="holyshit269" class="submitOrder">
									<div class="go-btn-wrap">
										<a id="J_Go2" href="/home/notpay_ok" class="btn-go" style="margin-left:10px;background:green;" tabindex="0" title="点击此按钮，取消订单">取消订单</a>
										<a id="J_Go" href="javascript:void(0);" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>

			
		</div>


	<script type="text/javascript">
		//再次确认页面最下的收货信息
		function xinxi(obj)
		{
			var onamee = $(obj).find('.buy-user').html();
			var tell = $(obj).find('.buy-phone').html();
			var addrr = $(obj).find('.buy--address-detail').html();

			$('.jisongzhi').html(addrr);
			$('.shouhuoren').html(onamee);
			$('.shoujihao').html(tell);
			
		}

		//收货信息删除
		function delClick(obj,id)
		{
			var str = confirm('确定删除么？')
			if(str){
			  	//删除
		        $(obj).parents('.user-addresslist').remove();

		        $.get('/home/balance_del',{id:id},function(data){
		        	// if(data==1){alert('删除成功')}else{alert('删除失败')}
		        })
			}

		}

		//***********订单修改相关****************************************
		$(function(){
			sum();
		})

		//  加1
		$('input[name="incre"]').click(function(){
			
			//  获取数量
			var num = Number($(this).prev().val())+1;

			//  获取价格
			var pr = $(this).parents('ul').find('.price-now').text();

			function accMul(arg1, arg2) {

		        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

		        try { m += s1.split(".")[1].length } catch (e) { }

		        try { m += s2.split(".")[1].length } catch (e) { }

		        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

			}

			//  金额发生改变  
			$(this).parents('ul').find('.number').text(accMul(num,pr));
			sum();
		})


		//  减1 
		$('input[name="decre"]').click(function(){
			
			//  获取数量
			var num = Number($(this).next().val())-1;

			//  获取价格
			var pr = $(this).parents('ul').find('.price-now').text();

			function accMul(arg1, arg2) {

		        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

		        try { m += s1.split(".")[1].length } catch (e) { }

		        try { m += s2.split(".")[1].length } catch (e) { }

		        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

			}
			
			// 金额发生改变
			if(num <= 1){
				$(this).parents('ul').find('.number').text(accMul(1,pr));
			} else {
				$(this).parents('ul').find('.number').text(accMul(num,pr));
			}

			sum();

		})  


		//  封装总价的函数
		function sum()
		{
			var sum = 0;

			//  遍历中的每个金额相加
			$('.number').each(function(){
				//  获取金额
				var prs = $(this).text();

				function accAdd(arg1,arg2){  
				    var r1,r2,m;  
				    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
				    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
				    m=Math.pow(10,Math.max(r1,r2))  
				    return (arg1*m+arg2*m)/m  
					}
					sum = accAdd(sum,prs);
				})

				$('.pay-sum').text(sum);
				$('#J_ActualFee').text(sum);
		}


		//***********保存数据到数据库****************************************
		$('#J_Go').click(function(){

			//获取订单信息
			var arr=[];
			var oname = $('.shouhuoren').html().replace(/(^\s*)|(\s*$)/g, "");
			var tel = $('.shoujihao').html().replace(/(^\s*)|(\s*$)/g, "");
			var addr = $('.jisongzhi').html().replace(/(^\s*)|(\s*$)/g, "");
			var sum = $('#J_ActualFee').text().replace(/(^\s*)|(\s*$)/g, "");
			var msg = $('input[name=msg]').val().replace(/(^\s*)|(\s*$)/g, "");
			arr.push([oname,tel,addr,sum,msg]);

			//获取订单详情信息
			var arr2=[];
			$('.J_Price').each(function(){
				//  获取金额
				var gid = $(this).parents('ul').find('.gid').val();
				var price = $(this).text();
				var cnt = $(this).parents('ul').find('.text_box').val();
				
				arr2.push([gid,price,cnt]);
				
			})

			//获取地址信息,去除两边空白
	        var aa = $('.jisongzhi').html().replace(/(^\s*)|(\s*$)/g, "");
	        var bb = $('.shouhuoren').html().replace(/(^\s*)|(\s*$)/g, "");
	        var cc = $('.shoujihao').html().replace(/(^\s*)|(\s*$)/g, "");

	        if(aa=='点击上方地址,选择您的收货地址' ||bb=='点击上方地址,选择收货人' ||cc=='手机号'){
	        	alert('请 您 填 写 收 货 信 息, 谢 谢 ! ! ! ')
	        	return false;
	        } else {
	        	//通过ajax发送到后台进行保存数据
				$.get('/home/balance_order',{arr:arr,arr2:arr2},function(oid){
					//console.log(oid);
					if(oid){
						location.replace('/home/pay_ok?oid='+oid);
					}
	       	 	})
	        }
			
			


		})

		$('#J_Go2').click(function(){
			var str = confirm('确定取消订单么？')
			if(!str){
			  	return false;
			}
		})

	</script>


@endsection