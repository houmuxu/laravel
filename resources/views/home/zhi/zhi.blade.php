@extends('common.home')

@section('title', $title)

@section('content')

  <meta name="format-detection" content="telephone=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>

  <link href="/home/css/personal.css" rel="stylesheet" type="text/css">



  <div class="nav-table">
    <div class="long-title"><span class="all-goods">全部分类</span></div>
    <div class="nav-cont">
      <ul>
      	<li class="index"><a href="/">首页</a></li>
        <li class="qc"><a href="#">闪购</a></li>
        <li class="qc"><a href="#">限时抢</a></li>
        <li class="qc"><a href="#">团购</a></li>
        <li class="qc last"><a href="/home/zhi/index">松鼠知</a></li>
      </ul>
    </div>
	</div>
			<b class="line"></b>	
<!--文章 -->
<div class="am-g am-g-fixed blog-g-fixed bloglist">
  <div class="am-u-md-9">
    <article class="blog-main">
      <h3 class="am-article-title blog-title">
        <a style="color:red;">三只松鼠欢迎您的光临！！！</a>
      </h3>
      <strong class="blog-tit"><p>{{$zhi->author}}<span>丨</span></p></strong>
      <h4 class="am-article-meta blog-meta">{{date('Y-m-d H:i:s',$zhi->addtime)}}</h4>

      <div class="am-g blog-content">
        <div class="am-u-sm-12">
          <p>{{$zhi->zhi1}}</p>
          
          <!-- <strong class="blog-tit"><p>###<span>丨</span>###</p></strong> -->
          <div class="Row">

            @foreach ($goods1 as $k=>$v)
          	<li><a href="/home/goodsshow/{{$v->gid}}"><img src="{{$v->goodspics[0]->gpic}}"/></a>
                  <p style="height:48px;overflow:hidden;background:whitesmoke">{{$v->gname}}</p>
            </li>
            @endforeach
      
          </div>
          <div></div>
          <p>{{$zhi->zhi2}}</p>


         <strong class="blog-tit"><p>松鼠使命<span>丨</span>让天下主人爽起来</p></strong>
          <div class="Row" style="display:block">

          	   @foreach ($goods2 as $k=>$v)
                  <li><a href="/home/goodsshow/{{$v->gid}}"><img src="{{$v->goodspics[0]->gpic}}"/></a>
                      <p style="height:48px;overflow:hidden;background:whitesmoke">{{$v->gname}}</p>
                  </li>
               @endforeach

          </div>
          
          <p>{{$zhi->zhi3}}</p>
          
          
         <strong class="blog-tit"><p>松鼠梦想：<span>丨</span>创造独特的松鼠王国</p></strong>
          <div class="Row">

          	 @foreach ($goods3 as $k=>$v)
                <li><a href="/home/goodsshow/{{$v->gid}}"><img src="{{$v->goodspics[0]->gpic}}"/></a>
                    <p style="height:48px;overflow:hidden;background:whitesmoke">{{$v->gname}}</p>
                </li>
            @endforeach

          </div>          
          
           <p>{{$zhi->zhi4}}</p>
          

        </div>
  
      </div>

    </article>


  </div>

  <div class="am-u-md-3 blog-sidebar">
    <div class="am-panel-group">

      <section class="am-panel am-panel-default">
        <div class="am-panel-hd">热门广告</div>

        @foreach ($advert as $k=>$v)
        <div  style="margin-top:10px">
          <a href="{{$v->adurl}}" target="_blank"><img src="{{$v->adpic}}" alt=""></a>
        </div>
        @endforeach
        <!-- <ul class="am-list blog-list">
        	<li><a href="#"><p>[特惠]闺蜜喊你来囤国货啦</p></a></li>  
          <li><a href="#"><p>[公告]华北、华中部分地区配送延迟</p></a></li>
          <li><a href="#"><p>[特惠]家电狂欢千亿礼券 买1送1！</p></a></li>
          <li><a href="#"><p>[公告]商城与广州市签署战略合作协议</p></a></li>
          <li><a href="#"><p>[特惠]洋河年末大促，低至两件五折</p></a></li>      
        </ul> -->
      </section>

    </div>
  </div>

</div>


<script src="/home/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>

<script src="/home/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

@endsection
