@extends('common.home')

@section('title', $title)

@section('content')



<link href="/home/css/sustyle.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js"></script>



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
        <a href="/home/person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="/home/person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>






<script type="text/javascript">
  setTimeout(function () { 
    location.href = "/" 
  }, 5000);
</script>



@endsection
