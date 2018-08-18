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
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"integrity="sha384-Tc5  IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
     <!--    <a href="/admin/first">首页</a>
        <a href="">演示</a> -->
        <a>
          <cite>{{$title}}</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" method="get" action="/admin/goods">
          
          <input class="layui-input" placeholder="最低价格" name="min"  value="{{$request->input('min')}}">
          <input class="layui-input" placeholder="最高价格" name="max"  value="{{$request->input('max')}}">
          <input type="text" name="gname" value="{{$request->input('gname')}}" placeholder="请输入商品名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
         <a href="/admin/goods/create" style="color: white;margin-left:10px "><button class="layui-btn"><i class="layui-icon"></i>添加</button></a>
        <span class="x-right" style="line-height:40px">共有数据：{{$zong}} 条</span>
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
            <th style="width: 140px">商品图片</th>
            <th>单价</th>
            <th>口味</th>
            <th style="width: 70px">库存</th>
            <th>类别</th>
            <!-- <th>商品描述</th> -->
            <th>添加时间</th>
            <th style="width: 80px">状态</th>
            <th>操作</th>
        </thead>
        <tbody>
          
      @foreach($data as $k=>$v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{$v->gid}}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->gid}}</td>
            <td>{{$v->gname}}</td>

            <td><img src="{{$pic[$k]}}" style="width: 150px;"></td>

            <td>{{$v->price}}</td>
            <td>{{$v->goodsattr}}</td>
            <td>{{$v->stock}}</td>
            <td>{{$v->cates['cname']}}</td>
           <!--  <td style="width:100px;overflow:hidden;white-space:nowrap;word-break:keep-all;">{{$v->desc}}</td> -->
            <td>{{date('Y-m-d',$v->uptime)}}</td>

            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">
              @if($v->state == 1)
                  上架
              @elseif($v->state == 2)
                  下架
              @endif
              </span>
            </td>

             <td class="td-manage">
              
              <a onclick="member_stop(this,{{$v->gid}})" href="javascript:;"  title="
                @if($v->state == 1)
                  下架
                @else
                  上架
                @endif
                ">
                <i class="layui-icon">&#xe601;</i>
              </a>
              

             

              <a title="编辑" href="/admin/goods/{{$v->gid}}/edit">
                <i class="layui-icon">&#xe642;</i>
              </a>
            
            
            <form action="/admin/goods/{{$v->gid}}" method="post" style="display: inline">


          
               <a title="删除" onclick="member_del(this,{{$v->gid}})" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>
             
            </form>
            </td>


          </tr>
      @endforeach
    

        </tbody>
      </table>
      <div class="page">
        <div>
         {{$data->appends($request->all())->links()}}
        </div>
      </div>

    </div>
   <script>

      
        $('.alert-success').slideUp(3000);


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
          layer.confirm('确认要'+obj.title+'吗？',function(index){
                       $.get('/admin/goodss/status',{id:id},function(data){
                        if(data == 1){
                           $(obj).attr('title','下架')
                      $(obj).find('i').html('&#xe601;');

                      $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已上架');
                      layer.msg('已上架!',{icon: 6,time:1000});
                    }else{
                       $(obj).attr('title','上架')
                      $(obj).find('i').html('&#xe62f;');

                      $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已下架');
                      layer.msg('已下架!',{icon: 5,time:1000});
                    }
                    })
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('/admin/goodss/del',{id:id},function(data){
                if(data){
                   $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                 }
              })
                
              
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            $.get('/admin/goodss/ajaxdel',{ids:data},function(info){
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