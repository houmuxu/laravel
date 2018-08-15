
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>广告修改页面</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
    <link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    
  </head>


  
  <body>
  @if(session('error'))
  
  <div class="shibai" style="height:40px;background:greenyellow;font-size: 20px;color:gray;line-height:40px;text-align:center;">
    {{session('error')}}
  </div>

@endif
    <div class="x-body">
        <form class="layui-form" action="/admin/advert/{{$res[0]->adid}}" enctype ="multipart/form-data" method="post">
        {{csrf_field()}}
        {{method_field('PUT')}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>广告名
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="adname" value="{{$res[0]->adname}}" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入广告名称
              </div>
          </div>
         <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>广告地址
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="adurl" value="{{$res[0]->adurl}}" required="" lay-verify="required"
                  autocomplete="off" class="layui-input">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>请输入广告地址
              </div>
          </div>
          <div class="layui-form-item">
              <label for="phone" class="layui-form-label">
                  <span class="x-red">*</span>广告图片
              </label>
        
                <!-- 显示图片 -->
                <div class="layui-input-inline">
                    <img src="{{$res[0]->adpic}}" style="width: 200px" class='gpic'>
                </div>

              <div class="layui-form-item" style="height:10px"></div>

              <!-- 上传图片 -->
              <div class="layui-input-inline" style="margin-left:109px">
                <input type="file" name="adpic" class="form-control" id="zx_img" style="padding: 0px;" placeholder="&nbsp;上传图片">
                <div>
                  <img id="img_preview" data-src="" src="" data-holder-rendered="true" style="width: 200px; display: block;">
                </div>
              </div>

              <script>
  
                //上传图片选择文件 判断是否为图片  并且刷新预览图
                $("#zx_img").change(function (e) {

                  //判断是否为图片格式
                  var img_id=document.getElementById('zx_img').value; //根据id得到值
                  var index= img_id.indexOf("."); //得到"."在第几位
                  img_id=img_id.substring(index); //截断"."之前的，得到后缀
                  if(img_id!=".bmp"&&img_id!=".png"&&img_id!=".gif"&&img_id!=".jpg"&&img_id!=".jpeg"){  //根据后缀，判断是否符合图片格式
                        alert("不是指定图片格式,重新选择"); 
                       document.getElementById('zx_img').value="";  // 不符合，就清除，重新选择
                       $("#img_preview").removeAttr("src");    //不符合，清除预览图
                  }

                  //获取目标文件
                  var file = e.target.files || e.dataTransfer.files;
                  //如果目标文件存在
                  if (file) {
                    //定义一个文件阅读器
                    var reader = new FileReader();
                    //文件装载后将其显示在图片预览里
                    reader.onload = function () {
                      $("#img_preview").attr("src", this.result);
                    }
                    //装载文件
                    reader.readAsDataURL(file[0]);
                  }
                });
              </script>
    

          </div>
          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              <button  class="layui-btn" lay-filter="add" lay-submit="">
                  修改
              </button>
          </div>
      </form>
    </div>

    <script type="text/javascript">
        //失败提示信息特效
       $('.shibai').delay(3000).slideUp(1000);
    </script>
    
  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>




    

