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
    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
      <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
      <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body>
    <div class="x-body">
        <form class="layui-form" action="/admin/goods/{{$gid}}" enctype ="multipart/form-data" method="post">
          {{csrf_field()}}

          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品类别
              </label>
              <div class="layui-input-inline" style="width:250px">
                <select id="shipping" name="cid" class="valid">
                @foreach($cates as $k=>$v)
                  @php
                    $n = substr_count($v->cpath,',')-1;
                  @endphp
                    <option value="{{$v->cid}}" 
                    	@if($data->cid == $v->cid) selected @endif
                    	>{{str_repeat('&nbsp;',$n*8)}}|----{{$v->cname}}</option>
                @endforeach
                </select>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="gname" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->gname}}">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品库存
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="stock" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->stock}}">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>商品单价
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="phone" name="price" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->price}}">
              </div>
          </div>

           <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>商品图片
              </label>
              <div class="layui-input-inline">
              	@foreach($data->goodspics as $k=>$v)
              		
              	<img src="{{$v->gpic}}" style="width: 150px">	
              	@endforeach
                  <input type="file" id="phone" multiple="multiple" name="gpic[]" required="" autocomplete="off" >
              </div>
          </div>

           <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>商品状态</label>
              <div class="layui-input-block">
                <input type="radio" name="state" lay-skin="primary" value="1" title="新品" checked="">
                <input type="radio" name="state" lay-skin="primary" value="2" title="上架">
                <input type="radio" name="state" lay-skin="primary" value="3" title="下架">
              </div>
          </div>


          <div class="layui-form-item layui-form-text">
              <label for="desc" class="layui-form-label">
                  商品描述
              </label>
              <div class="layui-input-block">
                  <textarea placeholder="请输入内容" id="desc" name="desc" class="layui-textarea">{{$data->desc}}</textarea>
              </div>
          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  添加
              </button>
          </div>
      </form>
    </div>
    <script>
        
    </script>
  </body>

</html>