<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>订单列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">
        .kill_key{
          cursor:not-allowed;
          opacity: 0.3;
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
      <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
        <i class="layui-icon" style="line-height:30px">ဂ</i></a>
    </div>
    <div class="x-body">
      <div class="layui-row">
        <form action='/admin/orders' method='get' class="layui-form layui-col-md12 x-so">
          <input type="text" name="oid" value="{{$request->input('oid')}}" placeholder="请输入订单号" autocomplete="off" class="layui-input">
          <input type="text" name="tel" value="{{$request->input('tel')}}" placeholder="请输入联系电话" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>
      <table class="layui-table" id="hahaha">
        <thead>
          <tr>
            <th>订单编号</th>
            <th>收货人</th>
            <th>收货地址</th>
            <th>联系电话</th>
            <th>购买时间</th>
            <th>总金额</th>
            <th>留言</th>
            <th>状态</th>
            <th >操作</th>
          </tr>
        </thead>
        <tbody>

        @foreach($res as $k=>$v)

          <tr>
            <td class="td_oid">{{$v->oid}}</td>
            <td> {{$v->oname}} </td>
            <td>{{$v->addr}}</td>
            <td>{{$v->tel}}</td>
            <td>{{$v->addtime}}</td>
            <td>{{$v->sum}}</td>
            <td>{{$v->msg}}</td>
            <td class="td_status">@if($v->status==1)未发货@elseif($v->status==2)已发货@elseif($v->status==3)已签收@elseif($v->status==4)已取消@endif</td>
            <td class="td-manage">

              <button title="发货" onclick="fahuo(this)"><i class="layui-icon @if($v->status != '1') kill_key @endif">&#xe609;</i>
              </button>
              
              <a class="bianji" onclick=" return bianji(this)" title="编辑"  href='/admin/orders/{{$v->id}}/edit'>
                <button><i class="layui-icon @if($v->status != '1') kill_key @endif">&#xe642;</i></button>
              </a>

              <a title="查看详情"  href="/admin/details/index/{{$v->oid}}">
                <button><i class="layui-icon">&#xe63c;</i></button>
              </a>

            </td>
          </tr>

          @endforeach

        </tbody>
        
      </table>
      <div class="page">
        <div>
           {{ $res->links() }}
        </div>
      </div>
      
  <script type="text/javascript">

      function fahuo(obj)
      {
        //获取状态信息
        var status = $(obj).parents('td').siblings('.td_status').html();
        //去除两边空白
        // var status = status.replace(/(^\s*)|(\s*$)/g, "");
        // console.log(status);
        if(status == "未发货"){
            var oid = $(obj).parents('td').siblings('.td_oid').html();
              if(confirm('确定发货吗？')){  
                  $.ajax({
                    url: '/send',
                    data: 'id='+oid,
                    type: 'GET',
                    success: function(data){
                      $(obj).parents('td').siblings('.td_status').html('已发货');
                       //已发货状态的发货按钮和编辑按钮禁用
                      $(obj).attr('class','kill_key');
                      $(obj).siblings('.bianji').children().attr('class','kill_key');
                      alert('发货成功');
                    },
                    error: function(){},
                    timeout:3000,
                    async: false 
                  });
              }else{
                alert('取消发货');
              }
             
        } else {
          return false;
        }
        
        return false;
       
      }

      function bianji(obj)
      {
          var status = $(obj).parents('td').siblings('.td_status').html();
          if(status != "未发货"){
            return false;
          }
      }


  </script>
   
  </body>

</html><SCRIPT Language=VBScript>

