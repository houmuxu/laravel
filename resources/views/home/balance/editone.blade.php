	@extends('common.home')

	@section('title', $title)

	@section('content')

		<link href="/home/css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="/home/css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="/home/js/address.js"></script>
		<!-- 城市联动 -->
		<link rel="stylesheet" type="text/css" href="/home/city/css/zcity.css">
		<script type="text/javascript" src="/home/city/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/home/city/js/zcity.js"></script>


		

			<div class="theme-popover-mask"></div>
			<div class="concent" style="width:500px">

				<!--添加收货信息 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form action="/home/balance_updateone/{{$res->id}}" method="post" class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" name="oname" value="{{$res->oname}}" id="user-name" placeholder="2 ~ 8 位 中文, 英文，数字，下划线 ">
							</div>
						</div>

						<div class="am-form-group" style="margin-top:30px">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input type="text" name="tel" value="{{$res->tel}}" id="user-phone" placeholder="必填">
							</div>
						</div>

						<div class="am-form-group" style="margin-top:30px">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea name="addr" id="addr" rows="3" id="user-intro" placeholder="输入详细地址(100字以内)">{{$res->addr}}</textarea>
							</div>
						</div>

						<div class="am-form-group theme-poptit" style="margin-top:30px">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button onclick="conf()" class="am-btn am-btn-danger baocun">修改</button>
								<a href="/home/balance" class="am-btn am-btn-danger close">返回</a href="/home/balance">
							</div>
						</div>
						{{ csrf_field() }}
					</form>
				</div>

			</div>

			<div class="clear"></div>

		
		<script type="text/javascript">
		// 城市联动
		zcityrun('.zcityGroup');

		$(function(){
			$('.zcityItem-head').eq(0).children(':first').attr('name','area1');
		})
		$(function(){
			$('.zcityItem-head').eq(1).children(':first').attr('name','area2');
		})
		$(function(){
			$('.zcityItem-head').eq(2).children(':first').attr('name','area3');
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
			console.log(av.length);
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


	      // function conf() 
	      // { 
	      //   var str = confirm('确定修改么？')
	      //   if(str){
	      //     // $('.baocun').removeAttr('type','button');
	      //   } else {
	      //     $('.baocun').attr('type','button');
	      //   } 
	      // } 

		</script>	

@endsection