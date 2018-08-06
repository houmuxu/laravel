<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>订单详情页</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
      .kill_key{
          cursor:not-allowed;
          opacity: 0.1;
        }

    </style>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/admin/orders">订单列表</a>
        <a>
          <cite>订单详情</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">

      <table class="layui-table">
        <thead>
          <tr>
            <th>商品名称</th>
            <th>商品图片</th>
            <th>购买单价</th>
            <th>购买数量</th>
            <th>总金额</th>
            <th >操作</th>
          </tr>
        </thead>
        <tbody>

        @foreach($res as $k=>$v)

          <tr>
           
            <td>{{$v->det_goods->gname}}</td>
            <td><img src="{{$v->det_goodspic[0]->gpic}}"></td>
            <td>{{$v->price}}</td>
            <td>{{$v->cnt}}</td>
            <td>{{$v->price*$v->cnt}}</td>

            <td class="td-manage" width="30px">
              <a title="编辑" @if($status != '1') href='javascript:void(0)' @endif href='/admin/details/edit/{{$v->did}}'>
                <button><i class="layui-icon @if($status != '1') kill_key @endif">&#xe642;</i></button>
              </a>
            </td>

          </tr>

          @endforeach

        </tbody>
        
      </table>
   
  </body>

</html><SCRIPT Language=VBScript>

