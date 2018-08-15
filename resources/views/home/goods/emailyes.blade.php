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
        			<!-- 弹窗 -->
  	<link rel="stylesheet" type="text/css" href="/home/hou_email/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/home/hou_email/css/htmleaf-demo.css">
	<link rel="stylesheet" href="/home/hou_email/css/style.css">
	<link rel="stylesheet" href="/home/hou_email/css/x0popup.min.css">
	<link rel="stylesheet" href="/home/hou_email/css/rainbow.monokai.css">
@section('content')
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="am-cf am-padding">
						<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">绑定邮箱</strong> / <small>Email</small></div>
					</div>
					<hr/>
					<!--进度条-->
					<div class="m-progress">
						<div class="m-progress-list">
							<span class="step-1 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">1<em class="bg"></em></i>
                            </span>
							<span class="step-2 step">
                                <em class="u-progress-stage-bg"></em>
                                <i class="u-stage-icon-inner">2<em class="bg"></em></i>
                            </span>
							<span class="u-progress-placeholder"></span>
						</div>
						<div class="u-progress-bar total-steps-2">
							<div class="u-progress-bar-inner"></div>
						</div>
					</div>
					<form class="am-form am-form-horizontal" action="" method="get">
						<div class="am-form-group">
							<label for="user-email" class="am-form-label">新邮箱</label>
							<div class="am-form-content">
								<input type="email" id="user-email" placeholder="请输入邮箱地址" name="email">
							</div>
						</div>
							
							<a class="btn" href="javascript:void(0);" id="sendMobileCode">
								<div class="am-btn am-btn-danger" style="margin-left:253px;margin-top: 40px">点击发送验证</div>
							</a>
						
						
					
					</form>

				</div>
				<script type="text/javascript">
					$.ajaxSetup({
					    headers: {
					        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					    }
					});

				$('#sendMobileCode').click(function(){
					var email = $('#user-email').val();
					var reg = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
					if(!reg.test(email)){
				        $.message('邮箱格式不正确!');
				        return false;
					}
					$.get('/home/goods/useremail',{emails:email},function(data){
						if(data){
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
							$.message('请前往新邮箱点击激活');
							setTimeout(function(){
									location.replace('/home/self');
								},1500);
						}
					})
				})


				$('.info-btn').click(function(){

				})
				</script>
					<script src="/home/hou_email/js/x0popup.min.js"></script>
	<script src="/home/hou_email/js/rainbow.min.js"></script>
	<script src="/home/hou_email/js/rainbow.linenumbers.min.js"></script>
	<script type="text/javascript">
		$(function(){
			x0p('三只松鼠提示您', '更换邮箱成功!');
			
			setTimeout(function(){
				location.replace('/home/self');
			},1000);
		})
	
			
		// }
	</script>
				<!--底部-->
		@endsection
