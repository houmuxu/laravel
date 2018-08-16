<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>三只松鼠后台管理</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
	<link rel="stylesheet" href="/admin/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>

</head>
<body>
         @php
         $res = DB::table('admin')->where('aid',session('aid'))->first();           
        @endphp
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="/admin/first">三只松鼠后台管理</a></div>
        <div class="left_open">
            <i title="展开左侧栏" class="iconfont">&#xe699;</i>
        </div>
        <ul class="layui-nav left fast-add" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">+新增</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('资讯','http://www.baidu.com')"><i class="iconfont">&#xe6a2;</i>资讯</a></dd>
              <dd><a onclick="x_admin_show('图片','http://www.baidu.com')"><i class="iconfont">&#xe6a8;</i>图片</a></dd>
               <dd><a onclick="x_admin_show('用户','http://www.baidu.com')"><i class="iconfont">&#xe6b8;</i>用户</a></dd>
            </dl>
          </li>
        </ul>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">{{$res->aname}}</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a onclick="x_admin_show('个人信息','/admin/admininfo/{{$res->aid}}')">个人信息</a></dd>
              <dd><a href="/admin/logout">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item to-index"><a href="/">前台首页</a></li>
        </ul>
        
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
     <!-- 左侧菜单开始 -->
    <div class="left-nav">
      <div id="side-nav">
        <ul id="nav">
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6b8;</i>
                    <cite>用户管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/user">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>会员管理</cite>
                            
                        </a>
                    </li >
                    <li>
                        <a _href="/admin/admin">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>后台管理员</cite>
                            
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>订单管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/orders">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>订单列表</cite>
                        </a>
                    </li >
                </ul>
            </li>
        <!-- 类别管理 -->  
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>类别管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/cate/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加类别</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/cate/">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>浏览类别</cite>
                        </a>
                    </li >
                </ul>
            </li>

        <!-- 商品管理 -->
            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>商品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/goods">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>商品列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/goods/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加商品</cite>
                        </a>
                    </li >
                </ul>
            </li>

        <!-- 商品管理结束 -->

            <!-- 友情链接管理 -->
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>链接管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/friendlink">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>链接列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/friendlink/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加链接</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <!-- 友情链接管理结束 -->

            <!-- 轮播图管理开始 -->
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>轮播图管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>

                        <a _href="/admin/lunbo/index">

                            <i class="iconfont">&#xe6a7;</i>
                            <cite>轮播图列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/lunbo/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加轮播图</cite>
                        </a>
                    </li >
                </ul>
            </li>

            <!-- 轮播图管理结束 -->

            <!-- 促销商品管理 -->
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>促销商品管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/sales">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>促销商品列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/sales/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加促销商品</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <!-- 促销商品管理结束 -->

            <!-- 广告管理 -->
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>广告管理</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/advert">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>广告列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/advert/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加广告</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <!-- 广告管理结束 -->

            <!-- 松鼠知 -->
             <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe723;</i>
                    <cite>松鼠知</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/zhi">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>松鼠知列表</cite>
                        </a>
                    </li >
                </ul>
                <ul class="sub-menu">
                    <li>
                        <a _href="/admin/zhi/create">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>添加松鼠知</cite>
                        </a>
                    </li >
                </ul>
            </li>
            <!-- 松鼠知结束 -->

            <li>
                <a href="javascript:;">
                    <i class="iconfont">&#xe6ce;</i>
                    <cite>系统统计</cite>
                    <i class="iconfont nav_right">&#xe697;</i>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a _href="echarts1.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>拆线图</cite>
                        </a>
                    </li >
                    <li>
                        <a _href="echarts2.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>柱状图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts3.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>地图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts4.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>饼图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts5.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>雷达图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts6.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>k线图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts7.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>热力图</cite>
                        </a>
                    </li>
                    <li>
                        <a _href="echarts8.html">
                            <i class="iconfont">&#xe6a7;</i>
                            <cite>仪表图</cite>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </div>
    </div>
    <!-- <div class="x-slide_left"></div> -->
    <!-- 左侧菜单结束 -->
@section('content')

@show
 <!-- 底部开始 -->
    <div class="footer" style="height:20px">
        <div class="copyright" style="line-height: 20px ">欢迎来到我的后台,不要轻举妄动哦,(* ￣3)(ε￣ *)!!!</div>  
    </div>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html><SCRIPT Language=VBScript></SCRIPT><SCRIPT Language=VBScript></SCRIPT>