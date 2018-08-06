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
        <form class="layui-form" action="/admin/orders/{{$res->id}}" method="POST">
          <div class="layui-form-item">
              <label for="L_email" class="layui-form-label">
                  <span class="x-red"></span>订单编号
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="true" name="oid" value="{{$res->oid}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>不可更改
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>收货人
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="L_username" lay-verify="nikename" name="oname" value="{{$res->oname}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>收货地址
              </label>
              <div class="layui-input-inline">
                  <input type="text" name="addr" value="{{$res->addr}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>联系电话
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="tel" value="{{$res->tel}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>购买时间
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="true" name="addtime" value="{{$res->addtime}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>不可更改
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>总金额
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="sum" value="{{$res->sum}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>留言
              </label>
              <div class="layui-input-inline">
                  <input type="text" readonly="true" name="msg" value="{{$res->msg}}" required=""
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>不可更改
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_username" class="layui-form-label">
                  <span class="x-red"></span>状态
              </label>
              <div class="layui-input-inline">
                  <input type="text"  name="status" value="{{$res->status}}" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          {{csrf_field()}}
          {{method_field('PUT')}}
          
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" onclick="conf()" lay-filter="add" lay-submit="">
                  确认修改
              </button>
          </div>  
      </form>
    </div>

    <script type="text/javascript">
      function conf() { 
        var msg = "您确定要修改吗？\r\n请确认！"; 
        if (confirm(msg)==true){ 
          return true; 
        }else{ 
          return false; 
        } 
      } 
    </script>
   
  </body>

</html><SCRIPT Language=VBScript>