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

  </head>
  
  <body>
    @if(session('error'))

      <div class="alert alert-danger" role="alert">
        <a href="/admin/goods" class="alert-link">{{session('error')}}</a>
      </div>
        
      @endif
    <div class="x-body">
<<<<<<< HEAD
        <form class="layui-form" action="/admin/lunbo/store" enctype ="multipart/form-data" method="post">
=======
        <form class="layui-form" action="/admin/lunbo" enctype ="multipart/form-data" method="post">
>>>>>>> origin/zhang
          {{csrf_field()}}

         
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>URL
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="url" required="" 
                  autocomplete="off" class="layui-input">
              </div>
          </div>


           <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>商品图片
              </label>
              <div class="layui-input-inline">
                  <input type="file" id="file" name="pic" required="" autocomplete="off" >
              </div>
              <div class="layui-input-inline">

                  <input type="button" value="查看图像" onclick="readAsDataURL()" />
              </div>

          </div>
          <div id="result" name="result" style="display:inline"></div> 
          


           <div class="layui-form-item">
              <label class="layui-form-label"><span class="x-red">*</span>商品状态</label>
              <div class="layui-input-block">
                <input type="radio" name="status" lay-skin="primary" value="1" title="启用" checked="">
                <input type="radio" name="status" lay-skin="primary" value="2" title="禁用">
              </div>
          </div>

              <button  class="layui-btn" lay-submit="">
                  添加
              </button>
          </div>
      </form>
    </div>
    <script>
    
      
      function readAsDataURL(){ 
        //检验是否为图像文件 
        var file = document.getElementById("file").files[0]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        //将文件以Data URL形式读入页面 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result"); 
            //显示文件 
            result.innerHTML='<img src="' + this.result +'" width="800px"/>'; 
        } 

      } 

    </script>
  </body>
</html>