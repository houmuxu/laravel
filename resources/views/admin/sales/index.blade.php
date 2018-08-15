<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>欢迎页面-X-admin2.0</title>
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
    <div class="x-nav">
      <span class="layui-breadcrumb">
        <a href="/admin/first">首页</a>
       
        <a>
          <cite>{{$title}}</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
     <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" method="get" action="/admin/sales">
          
          <input class="layui-input" placeholder="最低价格" name="min" id="start" value="{{$request->input('min')}}">
          <input class="layui-input" placeholder="最高价格" name="max" id="end" value="{{$request->input('max')}}">
          <input type="text" name="gname" value="{{$request->input('gname')}}" placeholder="请输入商品名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
       
        <button class="layui-btn" onclick="x_admin_show('添加用户','/admin/sales/create')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px"></span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>商品名称</th>
            <th>原价</th>
            <th>现价</th>
            <th>库存</th>
            <th>商品图片</th>
            <th>口味</th>
            <th>上传时间</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($data as $k=>$v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->sid}}</td>
            <td style="width:200px">{{$v->gname}}</td>
            <td>{{$v->oldprice}}</td>
            <td>{{$v->newprice}}</td>
            <td>{{$v->stock}}</td>
            <td>
              
                <img src="
                @php
                  $sid = App\Model\Admin\Salespic::where('sid',$v->sid)->first();
                  echo $salespic = $sid['salespic']; 
                  
                @endphp

              ">
              
            </td>
            <td style="width:120px">{{$v->goodsattr}}</td>
            <td>{{date('Y-m-d',$v->uptime)}}</td>
            <!-- <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td> -->
            <td class="td-manage">
            
              <button>
                <a title="编辑" href="/admin/sales/{{$v->sid}}/edit">
                  <i class="layui-icon">&#xe642;</i>
                </a>
              </button>
              <form action="/admin/sales/{{$v->sid}}" method="post" style="display:inline">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <button>
                  <a title="删除" href="">
                    <i class="layui-icon">&#xe640;</i>
                  </a>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        <div>
         {{$data->links()}}
        </div>
      </div>

    </div>
    <script>
      

 
      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删
            $.get('/admin/sales/ajaxdel',{ids:data},function(info){
              if(info){
                layer.msg('删除成功', {icon: 1});
                $(".layui-form-checked").not('.header').parents('tr').remove();
              }
            })
        });
      }

    </script>
 
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>