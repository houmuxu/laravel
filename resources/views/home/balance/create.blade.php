<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>添加收货信息页面</title>

		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/address.js"></script>
		<!-- 城市联动 -->
		<link rel="stylesheet" type="text/css" href="/home/city/css/zcity.css">
		<script type="text/javascript" src="/home/city/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/home/city/js/zcity.js"></script>

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
					<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
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
			<div class="concent">
				<div class="nav white">
				<div class="logo"><img src="/home/images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="/home/images/logobig.png" /></li>
				</div>
				</div>
			</div>
			






			<div class="theme-popover-mask"></div>
			<div class="concent" style="width:500px">

				<!--添加收货信息 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form action="/home/balance_store" method="post" class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" name="oname" id="user-name" placeholder="2 ~ 8 位 中文, 英文，数字，下划线 ">
							</div>
						</div>

						<div class="am-form-group" style="margin-top:30px">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input type="text" name="tel" id="user-phone" placeholder="必填">
							</div>
						</div>

						<div class="am-form-group" style="margin-top:30px">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address chengshi">
				                <div class="zcityGroup" city-range="{'level_start':1,'level_end':3}" city-ini="北京,北京,昌平区"></div>
								
							</div>
						</div>

						<div class="am-form-group" style="margin-top:30px">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea name="addr" id="addr" rows="3" id="user-intro" placeholder="输入详细地址(100字以内)"></textarea>
							</div>
						</div>

						<div class="am-form-group theme-poptit" style="margin-top:30px">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button class="am-btn am-btn-danger baocun">保存</button>
								<a href="/home/balance" class="am-btn am-btn-danger close">返回</a href="/home/balance">
							</div>
						</div>
						{{ csrf_field() }}
					</form>
				</div>

			</div>

			<div class="clear"></div>

		
		<script type="text/javascript">
		// 城市联动
		zcityrun('.zcityGroup');

		$(function(){
			$('.zcityItem-head').eq(0).children(':first').attr('name','area1');
		})
		$(function(){
			$('.zcityItem-head').eq(1).children(':first').attr('name','area2');
		})
		$(function(){
			$('.zcityItem-head').eq(2).children(':first').attr('name','area3');
		})

		//验证收货人
		$('input[name=oname]').blur(function(){
			var ov = $(this).val();
			var reg = /^[a-zA-Z0-9\u4E00-\u9FA5]{2,8}$/;
			if(!reg.test(ov)){
				$(this).next().text(' *用户名格式不正确').css('color','red');
				$(this).css('border','solid 1px red');
				$('.baocun').attr('type','button');		//禁止提交
			} else {
				$(this).css('color','green');
				$(this).css('border','solid 1px green');
				$('.baocun').removeAttr('type','button');	
			}
		})

		//验证手机号
		$('input[name=tel]').blur(function(){
			var tv = $(this).val();
			var reg = /^1[3456789]\d{9}$/;
			if(!reg.test(tv)){
				$(this).css('color','red');
				$(this).css('border','solid 1px red');
				$('.baocun').attr('type','button');		//禁止提交
			}else{
				$(this).css('color','green');
				$(this).css('border','solid 1px green');
				$('.baocun').removeAttr('type','button');
			}
		})

		//验证详细地址
		$('#addr').blur(function(){
			var av = $(this).val();
			console.log(av.length);
			if(av.length >1 && av.length < 100 ){
				$(this).css('color','green');
				$(this).css('border','solid 1px green');
				$('.baocun').removeAttr('type','button');
			} else {
				$(this).css('color','red');
				$(this).css('border','solid 1px red');
				$('.baocun').attr('type','button');		//禁止提交
			}
		})

		//不为空
		$('.baocun').click(function(){
			if($('input[name=oname]').val()==''){
				$('input[name=oname]').css('border','solid 1px red');
				return false;
			}
			if($('input[name=tel]').val()==''){
				$('input[name=tel]').css('border','solid 1px red');
				return false;
			}
			if($('#addr').val()==''){
				$('#addr').css('border','solid 1px red');
				return false;
			}	
		})


		</script>
	

	</body>

</html>