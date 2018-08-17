<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>三只松鼠后台登录</title>
<link rel="stylesheet" type="text/css" href="/admin/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/admin/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/admin/css/component.css" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>欢迎你</h3>
						<form action="/admin/dologin" name="f" method="post" >
						@if(session('error')) 
           					 <div class="mws-form-message warning" style='font-size:16px'>                
                    		{{session('error')}}
           					 </div>
           				 @endif
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="aname" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="apwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="input_code">
								<span class="us_code"></span>
								<input name="code" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="text" placeholder="请输入验证码">
								 <img id="img" class="img" src="/admin/captcha" alt="" onclick="this.src = this.src +='?1'">
							</div>
							{{csrf_field()}}
							<button class="act-but submit"  style="color: #FFFFFF">登录</button>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="/admin/js/TweenLite.min.js"></script>
		<script src="/admin/js/EasePack.min.js"></script>
		<script src="/admin/js/rAF.js"></script>
		<script src="/admin/js/demo-1.js"></script>




	</body>

</html>