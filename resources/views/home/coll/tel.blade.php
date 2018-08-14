@extends('common.geren')
@section('title', $title)
		<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/stepstyle.css" rel="stylesheet" type="text/css">

		<script type="text/javascript" src="/home/js/jquery-1.7.2.min.js"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

		<!-- 弹窗 -->
        <link rel="stylesheet" href="/home/houtanchuang/message.css">
        <script src="/home/houtanchuang/message.js"></script>
@section('content')
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定手机</strong> / <small>Bind&nbsp;Phone</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                                <p class="stage-name"></p>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                                <p class="stage-name"></p>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal">
				
						<div class="am-form-group">
							<label for="user-new-phone" class="am-form-label">验证手机</label>
							<div class="am-form-content">
								<input type="tel" id="user-old-phone" placeholder="绑定新手机号">
							</div>

						</div>
						<div class="am-form-group code">
							<label for="user-new-code" class="am-form-label">验证码</label>
							<div class="am-form-content">
								<input type="tel" id="user-new-code" placeholder="短信验证码">
							</div>
							<a class="btn" href="javascript:void(0); id="sendMobileCode">
								<div class="am-btn am-btn-danger yanzheng">验证码</div>
							</a>
						</div>
						<div class="info-btn">
							<div class="am-btn am-btn-danger xiaodui">保存修改</div>
						</div>

					</form>

				</div>
				<!--底部-->

			<script type="text/javascript">
				// old
				$('.yanzheng').click(function(){
					var reg = /^1[3|4|5|8][0-9]\d{4,8}$/;

					var tel = $('#user-old-phone').val();
					if(!reg.exec(tel)){
				           $.message('手机号格式不正确!');
				           return false;
						
					}
					$.get('/home/tel/oldcode',{tel:tel},function(data){
						console.log(data)
						if(data){
							$('.yanzheng').css('background','#999');
							$('.yanzheng').css('border','solid 1px #999');
							$('.yanzheng').text('已发送验证码');
							setTimeout(function(){ 
							$('.yanzheng').text('验证码');
							$('.yanzheng').css('background','');
							},60000);
						}
					});

					return false;
				})

				// new
				$('.xiaodui').click(function(){
					var code = $('#user-new-code').val();
					$.ajax({
						url:'/home/tel/newcode',
						type:'get',
						data:{code:code},
						async:true,
						success:function(data){
							if(data == 0){
				           		$.message('验证码不正确,60秒后请重新输入');
							} else {
								$.extend({
									  message: function(options) {
									      var defaults={
									          message:' 操作成功',
									          time:'2000',
									          type:'success',
									          showClose:false,
									          autoClose:true,
									          onClose:function(){}
									      };
									      
									      if(typeof options === 'string'){
									          defaults.message=options;
									      }
									      if(typeof options === 'object'){
									          defaults=$.extend({},defaults,options);
									      }
									      //message模版
									      var templateClose=defaults.showClose?'<a class="c-message--close">×</a>':'';
									      var template='<div class="c-message messageFadeInDown">'+
									          '<div class="c-message--main">' +
									            '<i class=" c-message--icon c-message--'+defaults.type+'"></i>'+
									            templateClose+
									            '<div class="c-message--tip">'+defaults.message+'</div>'+
									          '</div>'+
									      '</div>';
									      var _this=this;
									      var $body=$('body');
									      var $message=$(template);
									      var timer;
									      var closeFn,removeFn;
									      //关闭
									      closeFn=function(){
									          $message.addClass('messageFadeOutUp');
									          $message.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
									              removeFn();
									          })
									      };
									      //移除
									      removeFn=function(){
									          $message.remove();
									          defaults.onClose(defaults);
									          clearTimeout(timer);
									      };
									      //移除所有
									      $('.c-message').remove();
									      $body.append($message);
									      //居中
									      $message.css({
									          'margin-left':'-'+$message.width()/2+'px'
									      })
									      //去除动画类
									      $message.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(){
									          $message.removeClass('messageFadeInDown');
									      });
									      //点击关闭
									      $body.on('click','.c-message--close',function(e){
									          closeFn();
									      });
									      //自动关闭
									      if(defaults.autoClose){
									          timer=setTimeout(function(){
									              closeFn();
									          },defaults.time)
									      }
									  }
									});
								$.message('更改成功');
								setTimeout(function(){
									location.replace('/home/self');
								},1000);
								
							}	
						}
					})
				});
			</script>
			@endsection