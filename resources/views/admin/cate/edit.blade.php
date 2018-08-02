<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
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
        <form class="layui-form" action="/admin/cate/{{$res->cid}}" method="post">
          
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>顶级类别
              </label>
              <div class="layui-input-inline">
                   <select id="shipping" name="pid" disabled class="valid">
                @foreach($cates as $k=>$v)
                  @php
                    $n = substr_count($v->npath,',')-1;
                  @endphp
                    <option value="{{$v->cid}}" @if($res->pid == $v->cid) selected @endif >{{str_repeat('&nbsp;',$n*8)}}|----{{$v->cname}}</option>
                @endforeach
                </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>类别名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="cname" value="{{$res->cname}}" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              {{csrf_field()}}
              {{method_field('PUT')}}
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改

              </button>
          </div>
      </form>
    </div>
    <script>
        
    </script>
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT>