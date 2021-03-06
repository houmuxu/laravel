@extends('common/geren')
@section('title',$title)
@section('content')
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/infstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="/home/css/component.css" />
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
		 @php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp
<style type="text/css">
.box{position: absolute;
	left: 165px;
	top: 80px;
	width: 170px;

}
</style>
	
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<form class="am-form am-form-horizontal" action="/home/self/userinfo/update" method="post" enctype ="multipart/form-data">
						<div class="user-infoPic">

              <div class="layui-input-inline" style="margin-top:7px;">
					<div class="box">
					<input type="file" name="upic" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple="">
					<label for="file-1"><svg xmlns="http://www.w1.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg> <span>修改头像</span></label>
				</div>
                <div>
                  <img id="img_preview" data-src="" src="{{$res->upic}}" data-holder-rendered="true" style="width: 120px;height: 120px; display: block;">
                </div>
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
								{{csrf_field()}}
								<div class="info-btn">
									<button class="am-btn am-btn-danger">保存修改</button>
								</div>

							</form>
							
						</div>

					</div>

				</div>


@endsection