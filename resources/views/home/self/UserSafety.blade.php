@extends('common/self')
@section('content')
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
		 @php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp
		<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<img class="am-circle am-img-thumbnail" src="../images/getAvatar.do.jpg" alt="">
							</div>

							<p class="am-form-help">头像</p>


							<div class="info-m">
								<div><b>用 户 名：<i>{{$res->uname}}</i></b></div>

								<div class="u-safety">
									 加入时间：
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">{{ date('Y-m-d',$res->utime)}}</i></span>
									</a>
								</div>
							</div>
						</div>

						<div class="check">
							<ul>
								<li>
									<i class="i-safety-lock"></i>
									<div class="m-left">
										<div class="fore1">登录密码</div>
										<div class="fore2"><small>为保证您购物安全，建议您定期更改密码以保护账户安全。</small></div>
									</div>
									<div class="fore3">
										<a href="/home/self/userupwd">
											<div class="am-btn am-btn-secondary">修改</div>
										</a>
									</div>
								</li>

								<li>
									<i class="i-safety-iphone"></i>
									<div class="m-left">
										<div class="fore1">手机验证</div>
										<div class="fore2"><small>您验证的手机：{{$res->utel
										}} 若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="/home/self/userutel">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
								<li>
									<i class="i-safety-mail"></i>
									<div class="m-left">
										<div class="fore1">邮箱验证</div>
										<div class="fore2"><small>您验证的邮箱：5831XXX@qq.com 可用于快速找回登录密码</small></div>
									</div>
									<div class="fore3">
										<a href="email.html">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
							</ul>
						</div>

					</div>
@endsection