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
								<div><b>用户名：<i>{{$res->uname}}</i></b></div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal">

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="{{$res->unick}}">

									</div>
								</div>
								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										
										<label class="am-radio-inline">
											<input type="radio"  @if($res->usex=='w') checked @endif name="usex" value="m" data-am-ucheck="" class="am-ucheck-radio" ><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 男
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
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select data-am-selected="" style="display: none;">
												<option value="a">2015</option>
												<option value="b">1987</option>
											</select><div class="am-selected am-dropdown " id="am-selected-gm6q3" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">2015</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">2015</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">1987</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select data-am-selected="" style="display: none;">
												<option value="a">12</option>
												<option value="b">8</option>
											</select><div class="am-selected am-dropdown " id="am-selected-388kw" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">12</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">12</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">8</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
											<em>月</em></div>
										<div class="birth-select2">
											<select data-am-selected="" style="display: none;">
												<option value="a">21</option>
												<option value="b">23</option>
											</select><div class="am-selected am-dropdown " id="am-selected-vogi7" data-am-dropdown="">  <button type="button" class="am-selected-btn am-btn am-dropdown-toggle am-btn-default">    <span class="am-selected-status am-fl">21</span>    <i class="am-selected-icon am-icon-caret-down"></i>  </button>  <div class="am-selected-content am-dropdown-content">    <h2 class="am-selected-header"><span class="am-icon-chevron-left">返回</span></h2>       <ul class="am-selected-list">                     <li class="am-checked" data-index="0" data-group="0" data-value="a">         <span class="am-selected-text">21</span>         <i class="am-icon-check"></i></li>                                 <li class="" data-index="1" data-group="0" data-value="b">         <span class="am-selected-text">23</span>         <i class="am-icon-check"></i></li>            </ul>    <div class="am-selected-hint"></div>  </div></div>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="utel" placeholder="{{$res->utel}}" type="tel">

									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" name="uemail" placeholder="{{$res->uemail}}" type="email">

									</div>
								</div>
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<div class="am-btn am-btn-danger">保存修改</div>
								</div>

							</form>
						</div>

					</div>
@endsection