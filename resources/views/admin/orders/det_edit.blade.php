<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>订单修改页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form" action="/admin/details/update/{{$res->did}}" method="POST">
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red"></span>商品名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="true"  name="gname" value="@if($res->gid >= 30){{$res->det_goods->gname}}@else{{$res->det_sales->gname}}@endif" required="" 
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>不可更改
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>商品图片
              </label>
              <div class="layui-input-inline">
                  <img src="
                              @if($res->gid >= 30)
                                {{$res->det_goodspic[0]->gpic}}
                              @else
                                {{$res->det_salespic[0]->salespic}}
                              @endif
                  ">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>购买单价
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="price" value="{{$res->price}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>购买数量
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="cnt" value="{{$res->cnt}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>总金额
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="sum" readonly="true" value="{{$res->price*$res->cnt}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>不可更改
              </div>
          </div>

          {{csrf_field()}}
          {{method_field('PUT')}}
          
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button onclick="conf()"  class="layui-btn queren" lay-filter="add" lay-submit="">
                  确认修改
              </button>
          </div>
         
      </form>
    </div>

    <script type="text/javascript">

      //修改按钮
      function conf() 
      { 
        var msg = confirm("您确定要修改吗？\r\n请确认！"); 
       if(msg){
          $('button').removeAttr('type','button');
        } else {
          $('button').attr('type','button');
        }
      } 

    //验证单价
    $('input[name=price]').blur(function(){
      var tv = $(this).val();
      var reg = /^(([1-9][0-9]*)|(([0]\.\d{1,2}|[1-9][0-9]*\.\d{1,2})))$/;
      if(!reg.test(tv)){
        $(this).css('color','red');
        $(this).css('border','solid 1px red');
        $('.baocun').attr('type','button');   //禁止提交
      }else{
        $(this).css('color','green');
        $(this).css('border','solid 1px green');
        $('.baocun').removeAttr('type','button');
      }
    })

    //验证数量
    $('input[name=cnt]').blur(function(){
      var tv = $(this).val();
      var reg = /^-?[1-9]\d*$/;
      if(!reg.test(tv)){
        $(this).css('color','red');
        $(this).css('border','solid 1px red');
        $('.baocun').attr('type','button');   //禁止提交
      }else{
        $(this).css('color','green');
        $(this).css('border','solid 1px green');
        $('.baocun').removeAttr('type','button');
      }
    })
    </script>
    
  </body>

</html><SCRIPT Language=VBScript>