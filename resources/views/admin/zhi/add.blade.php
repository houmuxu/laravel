
<!DOCTYPE html>
<html>
  
  <head>
    <meta charset="UTF-8">
    <title>添加松鼠知</title>
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

@if(session('error'))
  
  <div class="shibai" style="height:40px;background:greenyellow;font-size: 20px;color:gray;line-height:40px;text-align:center;">
    {{session('error')}}
  </div>

@endif

  <body> 
    <div class="x-body">
        <form class="layui-form" action="/admin/zhi" method="post">
        {{csrf_field()}}
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>作者
              </label>
              <div class="layui-input-inline">
                  <input type="text" id="username" name="author" required="" lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入作者名称">
              </div>
              <div class="layui-form-mid layui-word-aux">
                  <span class="x-red">*</span>最大10位字符
              </div>

          </div>
         <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>一级内容
              </label>
              <div class="layui-input-inline">
                  <textarea name="zhi1" id="" required="" lay-verify="required" autocomplete="off"  cols="100" rows="5" placeholder="请输入详细内容"></textarea>
              </div>

          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>二级内容
              </label>
              <div class="layui-input-inline">
                  <textarea name="zhi2" id="" required="" lay-verify="required" autocomplete="off"  cols="100" rows="5" placeholder="请输入详细内容"></textarea>
              </div>

          </div>
          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>三级内容
              </label>
              <div class="layui-input-inline">
                  <textarea name="zhi3" id="" required="" lay-verify="required" autocomplete="off"  cols="100" rows="5" placeholder="请输入详细内容"></textarea>
              </div>

          </div>

          <div class="layui-form-item">
              <label for="username" class="layui-form-label">
                  <span class="x-red">*</span>四级内容
              </label>
              <div class="layui-input-inline">
                  <!-- <input type="text" id="username" name="adurl" required="" lay-verify="required" autocomplete="off" class="layui-input"> -->
                  <textarea name="zhi4" id="" required="" lay-verify="required" autocomplete="off"  cols="100" rows="5" placeholder="请输入详细内容"></textarea>
              </div>

          </div>

          <div class="layui-form-item">
              <label for="L_repass" class="layui-form-label">
              </label>
              
              <button  class="layui-btn" lay-filter="add"  lay-submit="">
                  增加
              </button>
          </div>
      </form>
    </div>
    
    <script type="text/javascript">





         $('.shibai').delay(3000).slideUp(1000);



         //验证作者长度
          $('input[name=author]') .blur(function(){
            var av = $(this).val();
            console.log(av.length);
            if(av.length >1 && av.length < 11){
              $(this).css('color','green');
              $(this).css('border','solid 1px green');
              $('button').removeAttr('type','button');
            } else {
              $(this).css('color','red');
              $(this).css('border','solid 1px red');
              $('button').attr('type','button');   //禁止提交
            }
          })
  
     </script>
        




  </body>

</html><SCRIPT Language=VBScript><!--

//--></SCRIPT><SCRIPT Language=VBScript><!--

//--></SCRIPT>




    

