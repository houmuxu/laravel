<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/jquery.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}"> 
		<style type="text/css">
			
			.ds{
				display:none;
			}

			.cart-empty{
			height: 98px;
		    padding: 80px 0 120px;
		    color: #333;
			}

			.cart-empty .message{
				height: 98px;
			    padding-left: 341px;
			    background: url(/uploads/no-login-icon.png) 250px 22px no-repeat;
			}

			.cart-empty .message .txt {
			    font-size: 14px;
			}
			.cart-empty .message li {
			    line-height: 38px;
			}

			ol, ul {
			    list-style: outside none none;
			}

			.ftx-05, .ftx05 {
				color: #005ea7;
			}
			
			a {
			    color: #666;
			    text-decoration: none;
			    
			    font-size:12px;
			   }
		</style>
	</head>

	<body>

		<!--顶部导航条 -->
		<div class="am-container header">
			<ul class="message-l">
				<div class="topMessage">
					<div class="menu-hd">
						<a href="#" target="_top" class="h">亲，请登录</a>
						<a href="#" target="_top">免费注册</a>
					</div>
				</div>
			</ul>
			<ul class="message-r">
				<div class="topMessage home">
					<div class="menu-hd"><a href="/" target="_top" class="h">商城首页</a></div>
				</div>
				<div class="topMessage my-shangcheng">
					<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
				</div>
				<div class="topMessage mini-cart">
					<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
				</div>
				<div class="topMessage favorite">
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/home/images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

			<!--购物车 -->
			<div class="concent" id="gs">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
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
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>


					<div class="clear"></div>


					
					<tr class="item-list">
						<div class="bundle  bundle-last ">
						
							<div class="clear"></div>
							<div class="bundle-main">
							@foreach ($data as $k=>$v)
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" id="J_CheckBox_170769542747" name="items[]" value="170769542747" type="checkbox" gid="{{$v->id}}" goodsid="{{$v->gid}}" uid="{{$v->uid}}">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">

											<a href="#" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
												<img id="img" src="
												@php
												$gid = App\Model\Admin\Goodspic::where('gid',$v->gid)->first();
            									echo $gpic = $gid->gpic;

												@endphp
												" class="itempic J_ItemImg" width="78px"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="美康粉黛醉美唇膏 持久保湿滋润防水不掉色" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v->gname}}

												</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">{{$v->goodsattr}}</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">78.00</em>
												</div>
												<div class="price-line">
													<span class="J_Price price-now" tabindex="0">{{$v->price}}</span>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="min am-btn" name="decre" type="button" value="-" />
													<input class="text_box" name="" id='nums' type="text" value="{{$v->num}}" style="width:20px;line-height:18px;text-align:center" />
													<input class="add am-btn" name="incre" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number">{{$v->price * $v->num}}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">
							
                 						 移入收藏夹</a>
                  						<input type="hidden" name="delete" value="{{$v->id}}">
										<a href="" data-point-url="#" class="delete">

                  						删除</a>
                  
               
										</div>
									</li>
								</ul>
								@endforeach
							</div>
						</div>
					</tr>
				</div>
				

				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0.0</em></strong>
						</div>
						<div class="btn-area">
							<a href="javascript:void(0)" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>
			</div>
			
			


		<!-- 商品删除后的购物车空的页面 -->
		<div class='cart-empty ds'>
			<div class="message">
			    <ul>
			        <li class="txt">
			            购物车空空的哦~，去看看心仪的商品吧~
			        </li>
			        <li class="mt10">
			            <a href="/" class="ftx-05">
			                去购物&gt;
			            </a>
			        </li>
			            
			    </ul>
	    	</div>
		</div>

		<!-- 尾部 -->
		<div class="footer">
					<div class="footer-hd">
						<p>
							@foreach($links as $k=>$v)
							<a href="{{$v->furl}}">{{$v->fname}}</a>
							<b>|</b>
							@endforeach
							<a href="/">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
		</div>

	</body>
	<script type="text/javascript">

			//  删除
			$('.delete').click(function(){
				var cons = confirm('你确定要删除吗？');
				if(!cons) return;

				var id = $(this).siblings(':hidden').val();
				var del = $(this);
				$.get('/home/cart/del',{res:id},function(data){
						if(data){
							del.parents('ul').remove();
							sum();

							var gid = $('.check').attr('gid');
							// alert(gid);
							if(gid == undefined){
								$('.ds').show();
								$('#gs').hide();
							}
						}
				});
				return false;
			});


			//  全选
			var swith_All=true;
			$('#J_SelectAllCbx2').click(function(){
				if(swith_All){
					$('input[name="items[]"]').attr('checked',true);

				}else{
					$('input[name="items[]"]').attr('checked',false);

				}
				swith_All = !swith_All;
				cnt();
				sum();
				
				
			});


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
				incre();
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
				
				//  金额发生改变
					if(num < 1){
						$(this).parents('ul').find('.number').text(accMul(1,pr));
					}else{
						$(this).parents('ul').find('.number').text(accMul(num,pr));
						decre();
					}
					sum();	
								
				})  
			

			//  让总价发生改变
			$('.check').click(function(){
				sum();
				cnt();
			})

			//  封装总价的函数
			function sum()
			{
				var sm = 0;
				// var cnt = 0;
				//  判断多选框有没有被选中
				$(':checkbox:checked').each(function(){
					//  获取金额
					var prs = $(this).parents('ul').find('.number').text();
					//  获取数量
					// var num = $(this).parents('ul').find('#num').val();

					// console.log(prs);

					function accAdd(arg1,arg2){  
					    var r1,r2,m;  
					    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
					    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
					    m=Math.pow(10,Math.max(r1,r2))  
					    return (arg1*m+arg2*m)/m  
					}
					sm = accAdd(sm,prs);
					// cnt = accAdd(cnt,num);
				})
				$('.price').text(sm);
				// $('#J_SelectedItemsCount').text(cnt);
			} 

			function cnt()
			{
				var cnts = 0;
				//  判断多选框有没有被选中
				$('.check:checked').each(function(){
					//  获取数量
					nums = parseInt($(this).parents('ul').find('#nums').val());
					// // console.log(num);
					function accAdd(arg1,arg2){  
					    var r1,r2,m;  
					    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
					    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
					    m=Math.pow(10,Math.max(r1,r2))  
					    return (arg1*m+arg2*m)/m  
					}

					cnts = accAdd(cnts,nums);

				})

				$('#J_SelectedItemsCount').text(cnts);
			}

			function decre()
			{
				var cnt = 0;
				//  判断多选框有没有被选中
				$('.check:checked').each(function(){
					//  获取数量
					var num = $(this).parents('ul').find('#nums').val();

					function accAdd(arg1,arg2){  
					    var r1,r2,m;  
					    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
					    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
					    m=Math.pow(10,Math.max(r1,r2))  
					    return (arg1*m+arg2*m)/m  
					}
					cnt = accAdd(cnt,num);
				})
				$('#J_SelectedItemsCount').text(cnt-1);
			}

			function incre()
			{
				var cnt = 0;
				//  判断多选框有没有被选中
				$('.check:checked').each(function(){
					//  获取数量
					var num = $(this).parents('ul').find('#nums').val();

					function accAdd(arg1,arg2){  
					    var r1,r2,m;  
					    try{r1=arg1.toString().split(".")[1].length}catch(e){r1=0}  
					    try{r2=arg2.toString().split(".")[1].length}catch(e){r2=0}  
					    m=Math.pow(10,Math.max(r1,r2))  
					    return (arg1*m+arg2*m)/m  
					}
					cnt = accAdd(cnt,num);
				})
				$('#J_SelectedItemsCount').text(cnt+1);
			}

			$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
			//  去结算页面
			$('#J_Go').click(function(){
				var arr = [];
				var brr = [];
				$('.check:checked').each(function(){
					//  获取金额
					var prs = $(this).parents('ul').find('.number').text();
					//  获取数量
					var num = $(this).parents('ul').find('#nums').val();
					//  获取id号
					var id = $(this).attr('gid');
					// alert(id);
					// 	获取商品名称
					var gname = $(this).parents('ul').find('.item-title').text();
					// alert(gname);
					//  获取商品单价
					var price = $(this).parents('ul').find('.price-now').text();
					// alert(price);
					//  获取商品的描述
					var goodsattr = $(this).parents('ul').find('.sku-line').text();
					// alert(goodsattr);
					//  获取商品的id
					var goodsid = $(this).attr('goodsid');
					//  获取uid
					var uid = $(this).attr('uid');
					// alert(goodsid);

					arr.push([prs,id,num,gname,price,goodsattr,goodsid,uid]);

					brr.push([id]);
					// console.log(arr);

				})
				var del = $(this)
				$.post('/home/ajaxcart',{arr:arr,id:brr},function(data){
						
					if(data){
						del.parents('ul').remove();

						location.replace('/home/balance');
					// console.log(arr);
					}
				})	

			})

		</script>
</html>