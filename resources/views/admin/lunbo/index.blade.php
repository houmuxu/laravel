<!DOCTYPE html>
<html>
<<<<<<< HEAD
  
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
=======
  <head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="./css/font.css">
    <link rel="stylesheet" href="./css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="./lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/xadmin.js"></script>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"integrity="sha384-Tc5  IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
>>>>>>> origin/zhang
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
<<<<<<< HEAD
        <a href="">首页</a>
        <a href="">演示</a>
        <a>
          <cite>导航元素</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px"></i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
=======
     <!--    <a href="/admin/first">首页</a>
        <a href="">演示</a> -->
        <a>
          <cite></cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" method="get" action="/admin/goods">
          
          <input class="layui-input" placeholder="最低价格" name="min" id="start" value="{{$request->input('min')}}">
          <input class="layui-input" placeholder="最高价格" name="max" id="end" value="{{$request->input('max')}}">
          <input type="text" name="gname" value="{{$request->input('gname')}}" placeholder="请输入商品名" autocomplete="off" class="layui-input">
>>>>>>> origin/zhang
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
<<<<<<< HEAD
        <button class="layui-btn" onclick="x_admin_show('添加用户','./admin-add.html')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>URL</th>
            <th>图片</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          @foreach($data as $v)
=======
         <a href="/admin/goods/create" style="color: white;margin-left:10px "><button class="layui-btn"><i class="layui-icon"></i>添加</button></a>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>

      @if(session('success'))
        <div class="alert alert-success" role="alert">{{session('success')}}</div>
      @endif

      @if(session('error'))
      <div class="alert alert-danger" role="alert">{{session('error')}}</div>
      @endif

      <table class="layui-table" style=" table-layout: fixed;width:100%;">
        <thead>
          <tr>
            <th  style="width: 48px" >
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th style="width: 60px">ID</th>
            <th style="width: 130px">商品名称</th>
            <th style="width: 150px">商品图片</th>
            <th>单价</th>
            <th>口味</th>
            <th>库存</th>
            <th>类别</th>
            <!-- <th>商品描述</th> -->
            <th>添加时间</th>
            <th style="width: 80px">状态</th>
            <th>操作</th>
        </thead>
        <tbody>
      @foreach($data as $k=>$v)
>>>>>>> origin/zhang
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
<<<<<<< HEAD
            <td>{{$v->id}}</td>
            <td>{{$v->url}}</td>
            <td> <img src="{{$v->pic}}"></td>
            <td>{{date('Y-m-d',$v->uptime)}}</td>
            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini"> @if($v->status == 1)
                  已启用
                @else
                  已停用
                @endif</span></td>
            <td class="td-manage">
              <a onclick="member_stop(this,{{$v->id}})" href="javascript:;"  title="
                @if($v->status == 1)
                  停用
                @else
                  启用
                @endif
                ">
                <i class="layui-icon">&#xe601;</i>
              </a>
              <a title="编辑"  onclick="x_admin_show('编辑','admin-edit.html')" href="javascript:;">
                <i class="layui-icon">&#xe642;</i>
              </a>
              <a title="删除" onclick="member_del(this,'要删除的id')" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
=======
            <td>{{$v->url}}</td>

            <td><img src="{{$vpic}}" style="width: 150px;"></td>

            <td>{{date('Y-m-d',$v->uptime)}}</td>

            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">
            xx
              </span>
            </td>

             <td class="td-manage">
              <button>
              <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">
                <i class="layui-icon">&#xe601;</i>
              </a>
              </button>
            <!--   <a title="查看"  onclick="x_admin_show('编辑','order-view.html')" href="javascript:;">
                <i class="layui-icon">&#xe63c;</i>
              </a> -->
              <button>

              <a title="编辑" href="/admin/goods/{{$v->gid}}/edit">
                <i class="layui-icon">&#xe642;</i>
              </a>
            
            </button>
            <form action="/admin/goods/{{$v->gid}}" method="post" style="display: inline">

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
     
    

>>>>>>> origin/zhang
        </tbody>
      </table>
      <div class="page">
        <div>
<<<<<<< HEAD
          <a class="prev" href="">&lt;&lt;</a>
          <a class="num" href="">1</a>
          <span class="current">2</span>
          <a class="num" href="">3</a>
          <a class="num" href="">489</a>
          <a class="next" href="">&gt;&gt;</a>
=======
        
>>>>>>> origin/zhang
        </div>
      </div>

    </div>
<<<<<<< HEAD
    <script>
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要这样操作吗？',function(index){
                       $.get('/admin/lunbo/status',{id:id},function(data){
                        if(data == 1){
                           $(obj).attr('title','启用')
                      $(obj).find('i').html('&#xe601;');

                      $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                      layer.msg('已启用!',{icon: 5,time:1000});
                    }else{
                       $(obj).attr('title','停用')
                      $(obj).find('i').html('&#xe62f;');

                      $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                      layer.msg('已停用!',{icon: 5,time:1000});
                    }
                    })
              
          });
      }
=======
   <script>

      
        $('.alert-success').slideUp(3000);

>>>>>>> origin/zhang

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
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
<<<<<<< HEAD
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
=======
>>>>>>> origin/zhang
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>