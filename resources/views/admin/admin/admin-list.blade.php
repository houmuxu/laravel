@extends('common/uadmin')
@section('content')
<div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/admin" method='get'>
          <label>
              <select name="num" size="1" aria-controls="DataTables_Table_1">
                  <option value="5" @if($request->input('num') == '5') selected="selected" @endif >
                      5
                  </option>
                  <option value="15" @if($request->input('num') == '15') selected="selected" @endif>
                      15
                  </option>
                  <option value="30" @if($request->input('num') == '30') selected="selected" @endif>
                      30
                  </option>
              </select>
          </label>
          <input value='{{$request->input("aname")}}' type="text" name="aname" placeholder="请输入用户名" autocomplete="off" class="layui-input">
          {{csrf_field()}}
          <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
        </form>
      </div>
      <xblock>
<button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <form action="/admin/admin/create" method="get" style='display:inline'>
         <button class="layui-btn" ><i class="layui-icon"></i>添加</button>
        </form>
        <span class="x-right" style="line-height:40px">共有数据：{{$numm}} 条</span>
      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
            </th>
            <th>ID</th>
            <th>登录名</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>角色</th>
            <th>加入时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr></thead>
        <tbody>
           @foreach ($res as $res)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="{{$res->aid}}"><i class="layui-icon"></i></div>
            </td>
            <td>{{$res->aid}}</td>
            <td>{{$res->aname}}</td>
            <td>{{$res->atel}}</td>
            <td>{{$res->aemail}}</td>
            <td>
              @if($res->auth==1)
              管理员
              @elseif($res->auth==2)
              超级管理员
              @endif
            </td>
            <td>{{ date('Y-m-d',$res->atime)}}</td>
            <td class="td-status">
              <div>
                @if($res->astatus == '1')
                启用
                @else
                未启用
                @endif
              </div>
            </td>
            <td class="td-manage">
            @if ($res->astatus!=1)
            <form action="/admin/adminsta/{{$res->aid}}" method='get' style='display:inline'>
                {{csrf_field()}}
                <button class='btn btn-default'><i class="layui-icon"></i></button>
              </form>

            @else
              <form action="/admin/adminclo/{{$res->aid}}" method='get' style='display:inline'>
                {{csrf_field()}}
                <button class='btn btn-success'><i class="layui-icon"></i></button>
              </form>
            @endif

              <form action="/admin/admin/{{$res->aid}}/edit" method='get' style='display:inline'>
                
                <button class='btn btn-info'><i class="layui-icon"></i></button>
               
              </form>
              <form action="/admin/admin/{{$res->aid}}" method='post' style='display:inline'>
                  {{csrf_field()}}
                  {{method_field('DELETE')}}
                  <button class='btn btn-danger'><i class="layui-icon"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        
      </div>

    </div>




<script type="text/javascript">
  
      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            console.log(data);
            $.ajax({
              url:"/admin/adminall",
              data:{
                data:data
              },
              type:"get",
              dataType:"text",
              success:function(e){
                if(e){

                }else{

                }
              }
            });
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }




</script>


 



@endsection







