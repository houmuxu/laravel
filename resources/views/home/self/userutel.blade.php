@extends('common/geren')
@section('content')
@section('title',$title)
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/stepstyle.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="/home/js/jquery-1.7.2.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		 @php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp


						<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
					</div>
					<hr>
					<form class="am-form am-form-horizontal" action="/home/self/utelupdate" method="post">
						<div class="am-form-group bind">
							<label for="user-phone" class="am-form-label">换绑手机号</label>
							<div class="am-form-content">
								<input type="text" name="utel" value="" style="width:200px">
							</div>
						</div>
						<div class="am-form-group code">
							<label for="user-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input name="code" type="tel" id="code" placeholder="短信验证码" style="width:100px">
								<button id="ba"class="am-btn am-btn-danger" style="position: absolute;left: 200px;top: 0px; width:100px ">获取验证码</button>
							</div>
							
								
							

						</div>


						{{csrf_field()}}
						<div class="info-btn">
							<button class="am-btn am-btn-danger"style="position: absolute;left: 300px;top: 220px; width:100px ">保存修改</button>
						</div>
					{{csrf_field()}}
					</form>

				</div>



					<script type="text/javascript">
						$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});
						//点击发送验证码
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
								$('#ba').click(function(){
									//获取手机号
									var utel = $('input[name=utel]').val();

									$.post('/home/self/rsendcode',{number:utel},function(data){

										console.log(data);
									});
									return false;


								})


								//检测验证码

								$('input[name=code]').blur(function(){

									var cv = $(this).val();
									var cds = $(this);

									$.get('/home/self/rcheckcode',{code:cv},function(data){


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
					</script>
				
		
@endsection