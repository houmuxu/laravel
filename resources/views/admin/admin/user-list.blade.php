@extends('common/uadmin')
@section('content')
 <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so" action="/admin/user" method='get'>
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
          <input value='{{$request->input("uname")}}' type="text" name="uname" placeholder="请输入用户名" autocomplete="off" class="layui-input">
          {{csrf_field()}}
          <button class="layui-btn" lay-submit="" lay-filter="sreach"><i class="layui-icon"></i></button>
        </form>
      </div>
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        <form action="/admin/user/create" method="get" style='display:inline'>
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
            <th>用户名</th>
            <th>性别</th>
            <th>手机</th>
            <th>邮箱</th>

            <th>加入时间</th>
            <th>操作</th></tr>
        </thead>
        <tbody>
          @foreach($res as $k => $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id="2"><i class="layui-icon"></i></div>
            </td>
            <td>{{$v->uid}}</td>
            <td>{{$v->uname}}</td>
            <td>
               @if($v->usex=="w")
              女
              @elseif($v->usex=="m")
              男
              @endif
            </td>
            <td>{{$v->utel}}</td>
            <td>{{$v->uemail}}</td>

            <td>{{ date('Y-m-d',$v->utime)}}</td>
            <td class="td-manage">
              <form action="/admin/user/{{$v->uid}}/edit" method='get' style='display:inline'>
                <button class='btn btn-info'><i class="layui-icon"></i></button>
              </form>
              <form action="/admin/user/{{$v->uid}}" method='post' style='display:inline'>
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
        <div>
         {{$res->appends($request->all())->links()}}
        </div>
      </div>

    </div>



@endsection







