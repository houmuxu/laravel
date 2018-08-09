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
 
@if(session('success'))
  
  <div class="haha" style="height:40px;background:orange;font-size: 20px;color:blue;line-height:40px;text-align:center;">
    {{session('success')}}
  </div>

@endif

@if(session('error'))
  
  <div class="xixi">
    {{session('error')}}
  </div>

@endif

 <body>
   <div class="x-nav">
     <span class="layui-breadcrumb">
    <a href="/admin/first">首页</a>
       <a href="">演示</a>
       <a>
         <cite>商品列表</cite></a>
     </span>
     <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
       <i class="layui-icon" style="line-height:30px">ဂ</i></a>
   </div>
   <div class="x-body">
     <div class="layui-row">
       <form class="layui-form layui-col-md12 x-so">
         <input type="text" name="catename" value='{{$request->input("catename")}}' placeholder="请输入类别名" autocomplete="off" class="layui-input">
         <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
       </form>
     </div>
     <xblock>
       <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
       <button class="layui-btn" onclick="location.replace('/admin/cate/create')"><i class="layui-icon"></i>添加</button>
       <span class="x-right" style="line-height:40px">共有数据：88 条</span>
     </xblock>
     <table class="layui-table" style=" table-layout: fixed;width:100%;">
       <thead>
         <tr>
           <th  style="width: 20px" >
             <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
           </th>
           <th>ID</th>
           <th>类别名称</th>
           <th>父类名称</th>
           <th>path路径</th>
           <th>操作</th>
       </thead>
       <tbody>
     @foreach($cates as $k=>$v)
         <tr>
           <td>
             <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
           </td>
           <td>{{$v->cid}}</td>
           <td>{{$v->cname}}</td>
           <td>
            {{getName($v->pid)}}
           </td>
           <td>{{$v->path}}</td>
            <td class="td-manage">

             <button><a href="/admin/cate/{{$v->cid}}/edit" class='btu btu-info'><i class="layui-icon">&#xe642;</i></a></button>
             <form action="/admin/cate/{{$v->cid}}" method="post" style="display:inline">
               
              {{csrf_field()}}
              {{method_field('DELETE')}}

              <button class="shan"><i class="layui-icon">&#xe640;</i></button>
             </form>
            
           </td>


         </tr>
     @endforeach

       </tbody>
     </table>
     <div class="page">
       <div>
         {{$cates->links()}}
       </div>
     </div>

   </div>
   <script>
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

     $('.shan').click(function(){
        return confirm('确定要删除吗？');
     })

     $('.haha').delay(3000).slideUp(1000);

   </script>
   <script>var _hmt = _hmt || []; (function() {
       var hm = document.createElement("script");
       hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
       var s = document.getElementsByTagName("script")[0];
       s.parentNode.insertBefore(hm, s);
     })();</script>
 </body>

</html><SCRIPT Language=VBScript>//</SCRIPT><SCRIPT Language=VBScript>//</SCRIPT>