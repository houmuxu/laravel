@extends('common.home')

@section('title', $title)

@section('content')



<link href="/home/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>

<!-- 广告开始 -->
    <script type="text/javascript" src="/advert/js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="/advert/js/floatadv.js"></script> 
    <!-- 广告结束 -->

    <!-- 广告1开始 -->
    <div id="wzsse" style="position:absolute;z-index:999;width:200px">
      <div style="text-align:right;cursor:pointer;" id="closepiaofu">关闭</div>
      <a href="{{$advert->adurl}}" target="_blank"><img src="{{$advert->adpic}}" border="0"/></a>
    </div>

    <script type="text/javascript">
      $(function(){
        $("#closepiaofu").click(function () {
          $("#wzsse").hide();
        });
      })
      var ad1 = new AdMove("wzsse", true);
      ad1.Run();
    </script>
    <!-- 广告1结束 -->

      <!-- 广告2开始 -->
    <div id="wzsse2" style="position:absolute;z-index:999;width:200px">
      <div style="text-align:right;cursor:pointer;" id="closepiaofu">关闭</div>
      <a href="{{$advert2->adurl}}" target="_blank"><img src="{{$advert2->adpic}}" border="0"/></a>
    </div>

    <script type="text/javascript">
      $(function(){
        $("#closepiaofu").click(function () {
          $("#wzsse2").hide();
        });
      })
      var ad2 = new AdMove("wzsse2", true);
      ad2.Run();
    </script>
    <!-- 广告2结束 -->

  <!-- **************************************广告结束************************************************************ -->



<!-- 内容主体 -->
<div class="take-delivery" style="margin-left:400px">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{$data->sum}}</em></li>
       <div class="user-info">
         <p>收货人： {{$data->oname}} </p>
         <p>联系电话：{{$data->tel}} </p>
         <p>收货地址： {{$data->addr}} </p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="/home/order/index" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        
     </div>
    </div>
  </div>
</div>






<script type="text/javascript">
  // setTimeout(function () { 
  //   location.href = "/" 
  // }, 5000);
</script>



@endsection
