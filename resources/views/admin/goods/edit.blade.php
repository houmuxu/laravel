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
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/admin/ueditor/lang/zh-cn/zh-cn.js"></script>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"crossorigin="anonymous">
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"integrity="sha384-Tc5  IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>



  </head>
  
  <body>
     @if(session('error'))

      <div class="alert alert-danger" role="alert">
        <a href="/admin/goods" class="alert-link">{{session('error')}}</a>
      </div>
        
      @endif

    <div class="x-body">
        <form class="layui-form" action="/admin/goods/{{$gid}}" enctype ="multipart/form-data" method="post">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label" style="width:100px">
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
              <label for="username" class="layui-form-label" style="width:100px">
                  <span class="x-red">*</span>商品名称
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="gname" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->gname}}">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="username" class="layui-form-label" style="width:100px">
                  <span class="x-red">*</span>商品库存
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="stock" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->stock}}">
              </div>
          </div>

          <div class="layui-form-item">
              <label for="phone" class="layui-form-label" style="width:100px">
                  <span class="x-red">*</span>商品单价
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="price" name="price" required="" 
                  autocomplete="off" class="layui-input" value="{{$data->price}}">
              </div>
          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>商品口味
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="goodsattr"
                  autocomplete="off" class="layui-input" value="{{$data->goodsattr}}">
              </div>
          </div>
          <label for="phone" class="layui-form-label" style="width:100px">
                  <span class="x-red">*</span>商品图片
              </label>
           <div class="layui-form-item">
             
              	@foreach($data->goodspics as $k=>$v)
            	
                    <div class="col-xs-6 col-md-3" id='re'>
                      <a class="thumbnail" style="display: block">
                        <button type="button" class="close" aria-label="Close" style="width: 10px">
                          <span aria-hidden="true" class='pan' style="font-size:20px">&times;</span>
                        </button>
                        <img src="{{$v->gpic}}" style="width: 200px" class='gpic' gpid="{{$v->gpid}}">
                      </a>
                    </div>

              	@endforeach
             
              <!-- </div> -->
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label" style="width:100px">

            <div class="layui-input-inline">
                    <input type="file" id="file" multiple="multiple" name="gpic[]" autocomplete="off" >
            </div>
              </label>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label" style="width:100px">
        
                
                  <input type="button" value="读取图像" onclick="readAsDataURL()" />
          
            </label>

          <div id="result0" name="result" style="display:inline"></div> 
          <div id="result1" name="result" style="display:inline"></div> 
          <div id="result2" name="result" style="display:inline"></div> 
          <div id="result3" name="result" style="display:inline"></div> 
          <div id="result4" name="result" style="display:inline"></div> 
          <div id="result5" name="result" style="display:inline"></div> 

          </div>

           <div class="layui-form-item">
              <label class="layui-form-label" style="width:100px"><span class="x-red">*</span>商品状态</label>
              <div class="layui-input-block">

                <input type="radio" name="state" lay-skin="primary" value="1" title="上架" checked="">
                <input type="radio" name="state" lay-skin="primary" value="2" title="下架">
              </div>
          </div>


          <div class="layui-form-item layui-form-text">
              <label for="desc" class="layui-form-label" style="width:100px">
                  商品描述
              </label>
          </div>
          <script id="editor" type="text/plain" name="desc" style="width:1024px;height:500px;">{!!$data->desc!!}</script>
          <div class="layui-form-item" style="margin-top: 30px">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>
  <script>
    var ue = UE.getEditor('editor');

                    
              $('.pan').click(function(){
              var gpid = $(this).parent().siblings().attr('gpid');
              var re = $(this);

              $.get('/admin/goods/'+gpid,{},function(data){
                if(data == 1){
                  re.parents('#re').remove();
                  return false;
                }
              });
            });
          


                        
  </script>

  <!-- 显示图片 -->
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
            var result=document.getElementById("result0"); 
            //显示文件 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        } 

        var file = document.getElementById("file").files[1]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result1"); 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        }
       

        var file = document.getElementById("file").files[2]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result2"); 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        }

        var file = document.getElementById("file").files[3]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result3"); 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        }

        var file = document.getElementById("file").files[4]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result4"); 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        }

      

        var file = document.getElementById("file").files[5]; 
        if(!/image\/\w+/.test(file.type)){ 
            alert("看清楚，这个需要图片！"); 
            return false; 
        } 
        var reader = new FileReader(); 
        reader.readAsDataURL(file); 
        reader.onload=function(e){ 
            var result=document.getElementById("result5"); 
            result.innerHTML='<img src="' + this.result +'" width="200px"/>'; 
        }

      } 


    </script>
  </body>

</html>