<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
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
						<form action="#" name="f" method="post">
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
								<input name="apwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入验证码">
								 <img id="img" class="img" src="/admin/captcha" alt="" onclick="this.src = this.src +='?1'">
							</div>
							<div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF">登录</a></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="/admin/js/TweenLite.min.js"></script>
		<script src="/admin/js/EasePack.min.js"></script>
		<script src="/admin/js/rAF.js"></script>
		<script src="/admin/js/demo-1.js"></script>


作者：王羽落
链接：https://www.jianshu.com/p/73fcc4118767
來源：简书
简书著作权归作者所有，任何形式的转载都请联系作者获得授权并注明出处。
		<div style="text-align:center;">
<p>更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
	</body>

</html>