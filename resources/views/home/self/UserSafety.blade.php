@extends('common/geren')
@section('content')
@section('title',$title)
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
				@php
           			$res = DB::table('users')->where('uid',session('uid'))->first();
           			$num = $res->utel;
     				$str = substr_replace($num,'****',3,4);	
      		 	@endphp
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<!--标题 -->
		<div class="user-safety">
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">账户安全</strong> / <small>Set&nbsp;up&nbsp;Safety</small></div>
						</div>
						<hr>

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
										
			
										
										<div class="fore2"><small>您验证的手机：{{$str
										}} 若已丢失或停用，请立即更换</small></div>
									</div>
									<div class="fore3">
										<a href="/home/self/userutel">
											<div class="am-btn am-btn-secondary">换绑</div>
										</a>
									</div>
								</li>
							</ul>
						</div>

					</div>
				</div>
@endsection