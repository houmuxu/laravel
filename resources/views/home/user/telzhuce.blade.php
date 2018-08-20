<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="/home/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/home/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/home/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/home/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<li><a href="">手机号注册</a></li>
							</ul>

					<div class="am-tabs-bd">
						<div class="am-tab-panel am-active">
							<form  method="post">
									
							    <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 				</div>										
                				<div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pass" id="pass" placeholder="请输入8-12位密码">
                				</div>										
                 				<div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="repass" id="repass" placeholder="确认密码">
                 				</div>	
                 			{{csrf_field()}}
                 			</form>
                 			
								 <div class="login-links">
									<label for="reader-me">
										<input id="reader-me" name="reader" type="checkbox"> 点击表示您同意商城《服务协议》
									</label>
							  	</div>
							  

								<div class="am-cf">
									<input type="submit" id="register" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
								</div>
							

						</div>


								<div class="am-tab-panel">
									<form action="/user/zhuce" method="post">
							@if(session('error')) 
           					 <div  style='font-size:16px;color:red' >                
                    		{{session('error')}}
           					 </div>
           				 @endif
                 <div class="user-phone">
								    <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
								    <input type="tel" name="utel" id="phone" placeholder="请输入手机号">
                 </div>																			
										<div class="verification">
											<label for="code"><i class="am-icon-code-fork"></i></label>
											<input type="text" name="code" id="code" placeholder="请输入验证码">
											
											<button id='but'>获取</button>
										</div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="upwd" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="reupwd" id="passwordRepeat" placeholder="确认密码">
                 </div>	
                 <div class="am-cf">
											<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
										</div>
										{{csrf_field()}}
									</form>
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										
								
									<hr>
								</div>

								<script>
									$.ajaxSetup({
									    headers: {
									        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									    }
									});

								//密码
								var futel = false;
								var fcode = false;
								var fupwd = false;
								var freupwd = false;

							$('input[name=upwd]').blur(function(){
								var pv = $(this).val();
								var reg =  /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,}$/ ;
								if(!reg.test(pv)){
									$(this).css('border','solid 1px red');
									$(this).val('');
									$(this).attr('placeholder','要求至少8为包含字母数字')
								} else {
									$(this).css('border','solid 1px green');
									 fupwd = true;
								}
							})

							//确实密码
							$('input[name=reupwd]').blur(function(){

								var rpv = $(this).val();

								var pv = $('input[name=upwd]').val();

								if(rpv != pv){
									$(this).val('');

									$(this).attr('placeholder','两次密码不一致');

									$(this).css('border','solid 1px red');

								} else {


									$(this).css('border','solid 1px green');
									 freupwd = true;
								}

							})

							//手机号

							$('input[name=utel]').blur(function(){
								var nv = $(this).val();
								var reg = /^1[3456789]\d{9}$/;
								if(!reg.test(nv)){
									$(this).val('');
									$(this).attr('placeholder','手机号码不正确');
									$(this).css('border','solid 1px red');
								} else {
									$(this).css('border','solid 1px green');
									futel= true;
								}
							})

								//点击发送验证码
								$('#but').click(function(){
									//获取手机号
									var utel = $('input[name=utel]').val();

									$.post('/sendcode',{number:utel},function(data){

										console.log(data);
									});
									return false;


								})


								//检测验证码

								$('input[name=code]').blur(function(){

									var cv = $(this).val();
									var cds = $(this);

									$.get('/checkcode',{code:cv},function(data){


										if(data == '0'){

										cds.val('');

										cds.attr('placeholder','验证码不正确');


											cds.css('border','solid 1px red');


										} else {

											cds.css('border','solid 1px green');
											fcode= true;


										}
									})
								})


								//提交控制
								$(':submit').click(function(){
								if(futel && fcode && fupwd && freupwd ){
		
									return true;
								}
								
								return false;
							})
									//切换控制
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })


									//  邮箱注册
									/*$('#register').click(function(){
										var email = $(this).parents('.am-active').find('#email').val();
										// console.log(email);
										var pass = $(this).parents('.am-active').find('#pass').val();
										var repass = $(this).parents('.am-active').find('#repass').val();
										// console.log(pass);

										//  邮箱正则匹配

										var reg = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;

										if ( !reg.exec(email)) {
 										 	
 										 	return confirm('填写的邮箱不合法'); 
										}

										if(pass != repass){
											return confirm('两次密码不一致');
										}

									})*/


									//  邮箱注册
									$('input[name=email]').blur(function(){
										var ev = $(this).val();
										var reg = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
										if(!reg.test(ev)){
											$(this).css('border','1px solid red');
										} else {
											$(this).css('border','1px solid blue');
										}
									})

									//   密码验证
									$('input[name=pass]').blur(function(){
										var pv = $(this).val();
										var reg = /^\S{8,12}$/;
										if(!reg.test(pv)){
											$(this).css('border','1px solid red');
										} else {
											$(this).css('border','1px solid blue');
										}
									})

									//  两次密码验证
									$('input[name=repass]').blur(function(){
										var rpv = $(this).val();
										var pv = $('input[name=pass]').val();

										if(rpv != pv){
											$(this).css('border','1px solid red');
										} else {
											$(this).css('border','1px solid blue');
										}
									})  

									$('#register').click(function(){ 
										// 验证协议是否选中
										/*var reader = $('input[name=reader]').attr('checked',true);
										alert(reader);
										if(!reader){return false;}*/
										// arr = [];
										var email = $(this).parents('.am-active').find('#email').val();
										var pass = $(this).parents('.am-active').find('#pass').val();

										// arr.push([email,pass]);
										// console.log(arr);
										$.post('/doemail',{email:email,pass:pass},function(data){

											/*if(data == 1){
												return confirm('请激活你的邮箱才能登录');
											}*/
										})
									})

								</script>

							</div>
						</div>

				</div>
			</div>
			
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>

</html>