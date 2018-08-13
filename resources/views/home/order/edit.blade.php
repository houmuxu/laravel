@extends('common.geren')
@section('title', $title)


@section('content')

		<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/home/css/addstyle.css" rel="stylesheet" type="text/css">
		<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-address">

						
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">修改地址</strong></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form action="/home/address/update/{{$res->id}}" method="post" class="am-form am-form-horizontal">

										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" name="oname" value="{{$res->oname}}" id="user-name" placeholder="2 ~ 8 位 中文, 英文，数字，下划线">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" value="{{$res->tel}}" placeholder="必填" type="text" name="tel">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea name="addr" class="" id="addr"  rows="3" id="user-intro" placeholder="输入详细地址(100字以内)">{{$res->addr}}</textarea>
												
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button class="am-btn am-btn-danger baocun">保存</button>
											</div>
										</div>
										{{ csrf_field() }}
									</form>
								</div>

							</div>

						</div>

					</div>

					<script type="text/javascript">
						//模板自带
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})

						//验证收货人
						$('input[name=oname]').blur(function(){
							var ov = $(this).val();
							var reg = /^[a-zA-Z0-9\u4E00-\u9FA5]{2,8}$/;
							if(!reg.test(ov)){
								$(this).next().text(' *用户名格式不正确').css('color','red');
								$(this).css('border','solid 1px red');
								$('.baocun').attr('type','button');		//禁止提交
							} else {
								$(this).css('color','green');
								$(this).css('border','solid 1px green');
								$('.baocun').removeAttr('type','button');	
							}
						})

						//验证手机号
						$('input[name=tel]').blur(function(){
							var tv = $(this).val();
							var reg = /^1[3456789]\d{9}$/;
							if(!reg.test(tv)){
								$(this).css('color','red');
								$(this).css('border','solid 1px red');
								$('.baocun').attr('type','button');		//禁止提交
							}else{
								$(this).css('color','green');
								$(this).css('border','solid 1px green');
								$('.baocun').removeAttr('type','button');
							}
						})

						//验证详细地址
						$('#addr').blur(function(){
							var av = $(this).val();
							// console.log(av.length);
							if(av.length >1 && av.length < 100 ){
								$(this).css('color','green');
								$(this).css('border','solid 1px green');
								$('.baocun').removeAttr('type','button');
							} else {
								$(this).css('color','red');
								$(this).css('border','solid 1px red');
								$('.baocun').attr('type','button');		//禁止提交
							}
						})

						//不为空
						$('.baocun').click(function(){
							if($('input[name=oname]').val()==''){
								$('input[name=oname]').css('border','solid 1px red');
								return false;
							}
							if($('input[name=tel]').val()==''){
								$('input[name=tel]').css('border','solid 1px red');
								return false;
							}
							if($('#addr').val()==''){
								$('#addr').css('border','solid 1px red');
								return false;
							}	
						})
					</script>

					<div class="clear"></div>

				</div>
				<!--底部-->
@endsection