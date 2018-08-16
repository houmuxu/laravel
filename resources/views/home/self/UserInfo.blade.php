@extends('common/self')
@section('content')
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
		 @php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp
		<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="{{$res->upic}}" alt="">
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

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="/home/self/userinfo/update" method="post">

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" name="unick" value="{{$res->unick}}">
									</div>
								</div>
								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										
										<label class="am-radio-inline">
											<input type="radio"  @if($res->usex=='m') checked @endif name="usex" value="m" data-am-ucheck="" class="am-ucheck-radio" ><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 男
										</label>
										
										<label class="am-radio-inline">
											<input type="radio"  @if($res->usex=='w') checked @endif name="usex" value="w" data-am-ucheck="" class="am-ucheck-radio" ><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 女
										</label>
										
										<label class="am-radio-inline">
											<input type="radio"  @if($res->usex=='x') checked @endif name="usex" value="x" data-am-ucheck="" class="am-ucheck-radio" ><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 保密
										</label>
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="utel" value="{{$res->utel}}" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="uemail" value="{{$res->uemail}}" type="email">

									</div>
								</div>
								{{csrf_field()}}
								<div class="info-btn">
									<button class="am-btn am-btn-danger">保存修改</button>
								</div>

							</form>
						</div>

					</div>
@endsection