@extends('common/geren')
@section('content')
@section('title',$title)
<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
<link href="/home/css/stepstyle.css" rel="stylesheet" type="text/css">
<link href="/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>

		@php
            $res = DB::table('users')->where('uid',session('uid'))->first();
        @endphp

		
				

						<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改密码</strong> / <small>Password</small></div>
					</div>
					<hr/>
			
					<form class="am-form am-form-horizontal" action="/home/self/upwdupdate" method="post">
					@if(session('error')) 
           					                 
                    		
                    		<div class="alert alert-warning alert-dismissable">
							  <strong>{{session('error')}}</strong>
							</div>

           				 @endif
						<div class="am-form-group">
							<label for="user-old-password" class="am-form-label">原密码</label>
							<div class="am-form-content">
								<input type="password" id="user-old-password" placeholder="请输入原登录密码" name="oldupwd">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-new-password" class="am-form-label">新密码</label>
							<div class="am-form-content">
								<input type="password" id="user-new-password" placeholder="由数字、字母组合" name="upwd">
							</div>
						</div>
						<div class="am-form-group">
							<label for="user-confirm-password" class="am-form-label">确认密码</label>
							<div class="am-form-content">
								<input type="password" id="user-confirm-password" placeholder="请再次输入上面的密码" name="reupwd">
							</div>
						</div>
						{{csrf_field()}}
						<div class="info-btn">
							<button class="am-btn am-btn-danger">保存修改</button>
						</div>

					</form>

				</div>
				<script type="text/javascript">
					
					//密码
					$('input[name=upwd]').blur(function(){
								var pv = $(this).val();
								var reg =  /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{8,}$/ ;
								if(!reg.test(pv)){
									$(this).css('border','solid 1px red');
									$(this).val('');
									$(this).attr('placeholder','要求至少8为包含字母数字')
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

								} 

							})
				</script>

				
@endsection