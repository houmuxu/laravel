<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/admin/favicon.ico" type="image/x-icon" />
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
        <form class="layui-form">
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>权限名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="role" name="role_name" required="" lay-verify="required"
                  autocomplete="off" value="{{$role->role_name}}" rid="{{$role->id}}" class="layui-input" disabled>
              </div>
      
          </div>

          <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>权限</label>
              <div class="layui-input-block">
                @foreach($per as $k=>$v)
                <input type="checkbox" name="per_id[]" lay-skin="primary" @if(in_array($v->id,$xuan)) checked @endif title="{{$v->per_name}}" value="{{$v->id}}">
                @endforeach
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form,
          layer = layui.layer;

          //监听提交
          form.on('submit(add)', function(data){
            var rid = $('#role').attr('rid');
            var per = [];
            $('.layui-form-checked').each(function(n){
              per[n] = $(this).prev().val();
            })
            
              $.get('/admin/role/update/'+rid,{per:per},function(info){
                if(info){
                   //发异步，把数据提交给php
                  layer.alert("修改成功", {icon: 6},function () {
                      // 获得frame索引
                      var index = parent.layer.getFrameIndex(window.name);
                      //关闭当前frame
                      parent.layer.close(index);
                  });
                }
              })
           
            return false;
          });
          
          
        });
    </script>
 <!--    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script> -->
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT>