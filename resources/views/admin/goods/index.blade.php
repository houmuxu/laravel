<!DOCTYPE html>
<html>
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

  </head>
  
  <body>
    <div class="x-nav">
      <span class="layui-breadcrumb">
     <!--    <a href="/admin/first">首页</a>
        <a href="">演示</a> -->
        <a>
          <cite>商品列表</cite></a>
      </span>
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <button class="layui-btn" onclick="x_admin_show('添加用户','./admin-add.html')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
      </xblock>
      <table class="layui-table" style=" table-layout: fixed;width:100%;">
        <thead>
          <tr>
            <th  style="width: 20px" >
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>ID</th>
            <th>商品名称</th>
            <th style="width: 100px">商品图片</th>
            <th>单价</th>
            <th>库存</th>
            <th>类别</th>
            <th>商品描述</th>
            <th>添加时间</th>
            <th style="width: 30px">状态</th>
            <th>操作</th>
        </thead>
        <tbody>
      @foreach($data as $k=>$v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td>{{$v->gid}}</td>
            <td>{{$v->gname}}</td>

            <td><img src="{{$v->goodspics[0]->gpic}}"></td>

            <td>{{$v->price}}</td>
            <td>{{$v->stock}}</td>
            <td>{{$v->cates['cname']}}</td>
            <td style="width:100px;overflow:hidden;white-space:nowrap;word-break:keep-all;">{{$v->desc}}</td>
            <td>{{date('Y-m-d',$v->uptime)}}</td>

            <td class="td-status">
              <span class="layui-btn layui-btn-normal layui-btn-mini">
              @if($v->state == 1)
                  新品
              @elseif($v->state == 2)
                  上架
              @else
                  下架
              @endif
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
      @endforeach
    

        </tbody>
      </table>
      <div class="page">
        <div>
         {!!$data->links()!!}
        </div>
      </div>

    </div>
    <script>

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要下架吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','上架')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已下架');
                layer.msg('已下架!',{icon: 5,time:1000});
              }
              
          });
      }

     
</script>
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>