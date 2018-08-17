<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>松鼠知列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
    
         td div{
                overflow: hidden;
                 /*text-overflow: ellipsis;*/
                height:80px;
          }
    </style>



  </head>

@if(session('success'))
  
  <div class="chenggong" style="height:40px;background:greenyellow;font-size: 20px;color:gray;line-height:40px;text-align:center;">
    {{session('success')}}
  </div>

@endif


  
  <body>

    <div class="x-nav">
      
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
     
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
       <a href="/admin/zhi/create" style="color: white;margin-left:10px "><button class="layui-btn"><i class="layui-icon"></i>添加</button></a>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th style="width:20px">
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th style="width:20px">ID</th>
            <th style="width:60px">作者</th>
            <th style="width:135px">添加时间</th>
            <th>一级内容</th>
            <th>二级内容</th>
            <th>三级内容</th>
            <th>四级内容</th>
            <th style="width:30px">状态</th>
            <th style="width:60px">操作</th>
        </thead>
        <tbody>
          @foreach($data as $k=>$v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='{{$v->id}}'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->id}}</td>
            <td>{{$v->author}}</td>
            <td>{{date('Y-m-d H:i:s',$v->addtime)}}</td>
            <td><div>{{$v->zhi1}}</div></td>
            <td><div>{{$v->zhi2}}</div></td>
            <td><div>{{$v->zhi3}}</div></td>
            <td><div>{{$v->zhi4}}</div></td>
            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">
              @if($v->status == 1)
                  关闭
              @elseif($v->status == 2)
                  开启
              @endif
              </span>
            </td>
            <td class="td-manage">
                
                @if($v->status==1)
                  <a title="开启" onclick="return qiyong(this,{{$v->status}})" href="/admin/zhi_status/{{$v->id}}"><i class="layui-icon">&#xe605;</i></a>
                @else
                  <a title="关闭" onclick=" return qiyong(this,{{$v->status}})" href="/admin/zhi_status/{{$v->id}}"><i class="layui-icon">&#x1006;</i></a>
                @endif
              
                <a title="编辑" href="/admin/zhi/{{$v->id}}/edit">
                  <i class="layui-icon">&#xe642;</i>
                </a>
 
              <a title="删除" onclick="member_del(this,{{$v->id}},{{$v->status}})" href="javascript:;">
                <i class="layui-icon">&#xe640;</i>
              </a>


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


    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });


    //是否启用
    function qiyong(obj,status)
    {

        if(status==2){
          layer.msg('已经启用！！！!',{icon: 2,time:2000});  
          return false;
        }   
              
              
          
    }


      /*用户-删除*/
      function member_del(obj,id,status){

        if(status==2){
          layer.msg('启用中!!!',{icon:2,time:2000});
              return false;
        } else {
          layer.confirm('确认要删除吗？',function(index){
            // console.log(id);
              //发异步删除数据
              $.get('/admin/zhi_del',{id:id},function(data){
                 //console.log(data);
                if(data){
                   $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                 }
              })
                
              
          });
        }

          
      }



      function delAll (argument) 
      {

        var data = tableCheck.getData();
        // console.log(data);
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            $.get('/admin/zhi_delall',{ids:data},function(info){
                // console.log(info);
              if(info){
                // console.log(data);
                layer.msg('删除成功', {icon: 1});
                $(".layui-form-checked").not('.header').parents('tr').remove();
              }

            })
            
        });

      }

      $('.chenggong').delay(3000).slideUp(1000);


    </script>
    
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>