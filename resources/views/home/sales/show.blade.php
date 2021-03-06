@extends('common.home')

@section('title', $title)

@section('content')
        <link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet"
        type="text/css" />
        <link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet"
        type="text/css" />
        <link href="/home/basic/css/demo.css" rel="stylesheet" type="text/css"
        />
        <link type="text/css" href="/home/css/optstyle.css" rel="stylesheet" />
        <link type="text/css" href="/home/css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="/home/basic/js/jquery-1.7.min.js">
        </script>
        <script type="text/javascript" src="/home/basic/js/quick_links.js">
        </script>
        <script type="text/javascript" src="/home/AmazeUI-2.4.2/assets/js/amazeui.js">
        </script>
        <script type="text/javascript" src="/home/js/jquery.imagezoom.min.js">
        </script>
        <script type="text/javascript" src="/home/js/jquery.flexslider.js">
        </script>
        <script type="text/javascript" src="/home/js/list.js">
        </script>
        <!-- 加入购物车特效 -->
        <style type="text/css">
            .body-top {
                position: fixed;
                top: 0px;
                width: 100%;
                background: rgba(255,255,255,0.93);
                box-shadow: 0 0 10px #cfd0cf;
                z-index: 999;
            }
            .body-top-center {
                width: 1200px;
                margin: 0 auto;
            }
            .menu {
                float: left;
            }
            .menu-ul {
                overflow: hidden;
                float: left;
                padding: 10px 0;
            }
            .menu-li {
                float: left;
                width: 100px;
                height: 40px;
                margin-right: 5px;
            }
            .menu-a {
                display: block;
                width: 100px;
                height: 40px;
                text-align: center;
                line-height: 40px;
                font-size: 16px;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                -ms-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }
            .carts{
                margin-top: 200px;width: 100%;text-align: center;
            }
            .carts button{
                margin: 10px;
            }
            .tm-promo-type {
            background-color: #f47a86;
            border-radius: 1px;
            color: #fff;
            height: 16px;
            line-height: 16px;
            margin: 0 2px 4px 6px;
            padding: 1px 5px;
            position: relative;
            }
            em{font-style:normal;}
            dd{color:#333;margin-left:70px;font-family:Arial;}
</style>
<script type="text/javascript" src="/home/js/jquery-addShopping.js"></script>
    <!-- 加入购物车特效结束 -->


            </div>
            <b class="line">
            </b>
            <div class="listMain">
                <!--分类-->
                <div class="nav-table">
                    <div class="long-title">
                        <span class="all-goods">
                            全部分类
                        </span>
                    </div>
                    <div class="nav-cont">
                        <ul>
                            <li class="index">
                                <a href="/">
                                    首页
                                </a>
                            </li>
                            <li class="qc">
                                <a href="#">
                                    闪购
                                </a>
                            </li>
                            <li class="qc">
                                <a href="#">
                                    限时抢
                                </a>
                            </li>
                            <li class="qc">
                                <a href="#">
                                    团购
                                </a>
                            </li>
                            <li class="qc last">
                                <a href="#">
                                    大包装
                                </a>
                            </li>
                        </ul>
                        <div class="nav-extra">
                            <i class="am-icon-user-secret am-icon-md nav-user">
                            </i>
                            <b>
                            </b>
                            我的福利
                            <i class="am-icon-angle-right" style="padding-left: 10px;">
                            </i>
                        </div>
                    </div>
                </div>
                <ol class="am-breadcrumb am-breadcrumb-slash">
                    <li>
                        <a href="/">
                            首页
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            分类
                        </a>
                    </li>
                    <li class="am-active">
                        内容
                    </li>
                </ol>
                <script type="text/javascript">
                    $(function() {});
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            start: function(slider) {
                                $('body').removeClass('loading');
                            }
                        });
                    });
                </script>
                <div class="scoll">
                    <section class="slider">
                        <div class="flexslider">
                            <ul class="slides">
                                <li>
                                    <img src="/home/images/01.jpg" title="pic" />
                                </li>
                                <li>
                                    <img src="/home/images/02.jpg" />
                                </li>
                                <li>
                                    <img src="/home/images/03.jpg" />
                                </li>
                            </ul>
                        </div>
                    </section>
                </div>
                <!--放大镜-->
                <div class="item-inform">
                    <div class="clearfixLeft" id="clearcontent">
                        <div class="box">
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $(".jqzoom").imagezoom();
                                    $("#thumblist li").click(function() {
                                        $(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
                                        $(".jqzoom").attr('src', $(this).find("img").attr("mid"));
                                        $(".jqzoom").attr('rel', $(this).find("img").attr("big"));
                                    });
                                });
                            </script>
                            <div class="tb-booth tb-pic tb-s310">
                                <a href="{{$res[0]->salespic}}">
                                    <img src="{{$res[0]->salespic}}" alt="细节展示放大镜特效" rel="{{$res[0]->salespic}}"
                                    class="jqzoom" />
                                </a>
                            </div>
                            <ul class="tb-thumb" id="thumblist">
                                @foreach($res as $k=>$v)
                                <li class="tb-selected">
                                    <div class="tb-pic tb-s40">
                                       
                                            <img src="{{$v->salespic}}" mid="{{$v->salespic}}" big="{{$v->salespic}}">
                                        
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                    <div class="clearfixRight">
                        <!--规格属性-->
                        <!--名称-->
                        <div class="tb-detail-hd" id="name">
                            <h1>
                                {{$data->gname}}
                            </h1>
                        </div>
                        <div class="tb-detail-list">
                            <!--价格-->
                            <div class="tb-detail-price">
                                <li class="price iteminfo_price">
                                    <dt>
                                        促销价
                                    </dt>
                                    <dd>
                                        <em>
                                            ¥
                                        </em>
                                        <b class="sys_item_price">
                                            {{$data->newprice}}
                                        </b>
                                        <em class="tm-promo-type">
                                            <s></s>
                                            聚划算
                                        </em>
                                    </dd>
                                </li>
                                <li class="price iteminfo_mktprice">
                                    <dt>
                                        原价
                                    </dt>
                                    <dd>
                                        <em>
                                            ¥
                                        </em>
                                        <b class="sys_item_mktprice">
                                            {{$data->oldprice}}
                                        </b>
                                    </dd>
                                </li>
                                <div class="clear">
                                </div>
                            </div>
                            <!--地址-->
                            <dl class="iteminfo_parameter freight">
                                <dt>
                                    配送至
                                </dt>
                                <div class="iteminfo_freprice">
                                    <div class="am-form-content address">
                                        <select data-am-selected>
                                            <option value="a">
                                                浙江省
                                            </option>
                                            <option value="b">
                                                湖北省
                                            </option>
                                        </select>
                                        <select data-am-selected>
                                            <option value="a">
                                                温州市
                                            </option>
                                            <option value="b">
                                                武汉市
                                            </option>
                                        </select>
                                        <select data-am-selected>
                                            <option value="a">
                                                瑞安区
                                            </option>
                                            <option value="b">
                                                洪山区
                                            </option>
                                        </select>
                                    </div>
                                    <div class="pay-logis">
                                        包邮
                                     
                                        
                                    </div>
                                </div>
                            </dl>
                            <div class="clear">
                            </div>
                            <!--销量-->
                            <ul class="tm-ind-panel">
                                <li class="tm-ind-item tm-ind-sellCount canClick">
                                    <div class="tm-indcon">
                                        <span class="tm-label">
                                            月销量
                                        </span>
                                        <span class="tm-count">
                                            {{$data->num}}
                                        </span>
                                    </div>
                                </li>
                                <li class="tm-ind-item tm-ind-sumCount canClick">
                                    <div class="tm-indcon">
                                        <span class="tm-label">
                                            累计销量
                                        </span>
                                        <span class="tm-count">
                                            {{$data->num}}
                                        </span>
                                    </div>
                                </li>
                                <li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
                                    <div class="tm-indcon">
                                        <span class="tm-label">
                                            累计评价
                                        </span>
                                        <span class="tm-count">
                                            640
                                        </span>
                                    </div>
                                </li>
                            </ul>
                            <div class="clear">
                            </div>
                            <!--各种规格-->
                            <dl class="iteminfo_parameter sys_item_specpara">
                                <dt class="theme-login">
                                    <div class="cart-title">
                                        可选规格
                                        <span class="am-icon-angle-right">
                                        </span>
                                    </div>
                                </dt>
                                <dd>
                                    <!--操作页面-->
                                    <div class="theme-popover-mask">
                                    </div>
                                    <div class="theme-popover">
                                        <div class="theme-span">
                                        </div>
                                        <div class="theme-poptit">
                                            <a href="javascript:;" title="关闭" class="close">
                                                ×
                                            </a>
                                        </div>
                                        <div class="theme-popbod dform">
             <form class="theme-signin" name="loginform" action="#">
    				<input type="hidden" name="gid" id="sid" value="{{$data->sid}}">

                                                <div class="theme-signin-left">
                                                    @if(!$data->goodsattr == NULL)
                                                    <div class="theme-options">
                                                        <div class="cart-title">
                                                            口味
                                                        </div>
                                                        <ul>
                                                            @php
                                                            $goodsattr = explode(" ",$data->goodsattr);
                                                            @endphp
                                                            @foreach($goodsattr as $k=>$v)
                                                            <li class="sku-line @if($k == 0)selected @endif" attr="{{$v}}">{{$v}}<i></i>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @else
                                                     <div class="theme-options">
                                                        <div class="cart-title">
                                                            口味
                                                        </div>
                                                    <ul>
                                                     <li class="sku-line selected" attr='默认'>
                                                                默认
                                                                <i>
                                                                </i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    @endif
                                                    <div class="theme-options">
                                                        <div class="cart-title number">
                                                            数量
                                                        </div>
                                                        <dd>
                                                            <input id="min" class="am-btn am-btn-default" name="" type="button" value="-"
                                                            />
                                                            <input id="text_box" name="num" type="text" value="1" style="width:30px;"
                                                            />
                                                            <input id="add" class="am-btn am-btn-default" name="" type="button" value="+"
                                                            />
                                                            <span id="Stock" class="tb-hidden">
                                                                库存
                                                                <span class="stock">
                                                                    {{$data->stock}}
                                                                </span>
                                                                件
                                                            </span>
                                                        </dd>
                                                    </div>
                                                    <div class="clear">
                                                    </div>
                                                    <div class="btn-op">
                                                        <div class="btn am-btn am-btn-warning">
                                                            确认
                                                        </div>
                                                        <div class="btn close am-btn am-btn-warning">
                                                            取消
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="theme-signin-right">
                                                    <div class="img-info">
                                                        <img src="/home/images/songzi.jpg" />
                                                    </div>
                                                    <div class="text-info">
                                                        <span class="J_Price price-now">
                                                            ¥39.00
                                                        </span>
                                                        <span id="Stock" class="tb-hidden">
                                                            库存
                                                            <span class="stock">
                                                                {{$data->stock}}
                                                            </span>
                                                            件
                                                        </span>
                                                    </div>
                                                </div>
                                            <!-- </form> -->
                                        </div>
                                    </div>
                                </dd>
                            </dl>
                            <div class="clear">
                            </div>
                            <!--活动 -->
                            <div class="shopPromotion gold">
                                <div class="hot">
                                    <dt class="tb-metatit">
                                        店铺优惠
                                    </dt>
                                    <div class="gold-list">
                                        <p>
                                            购物满2件打8折，满3件7折
                                            <span>
                                                点击领券
                                                <i class="am-icon-sort-down">
                                                </i>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                <div class="clear">
                                </div>
                                <div class="coupon">
                                    <dt class="tb-metatit">
                                        优惠券
                                    </dt>
                                    <div class="gold-list">
                                        <ul>
                                            <li>
                                                98减5
                                            </li>
                                            <li>
                                                198减10
                                            </li>
                                            <li>
                                                298减20
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pay">
                            <div class="pay-opt">
                                <a href="home.html">
                                    <span class="am-icon-home am-icon-fw">
                                        首页
                                    </span>
                                </a>
                                <a>
                                    <span class="am-icon-heart am-icon-fw">
                                        收藏
                                    </span>
                                </a>
                            </div>
                            <li>
                                <div class="clearfix tb-btn tb-btn-buy theme-login">
                                    <a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">
                                        立即购买
                                    </a>
                                </div>
                            </li>

                            <script type="text/javascript">
                                
                                 var goodsattr = $('.sku-line,.selected').attr('attr')
                                       $('.sku-line,.selected').click(function(){
                                             goodsattr = $(this).attr('attr');
                                           
                                        })
                                    $('#LikBuy').click(function(){
                                        var sid = $('#sid').val();
                                        var num = $('#text_box').val();
                                        var arr = [];

                                        arr[0] = sid;
                                        arr[1] = num;
                                        arr[2] = goodsattr;
                                        $.get('/home/shop_now',{res:arr},function(data){
                                            if(data){
                                                location.replace('/home/balance');
                                            }
                                            // console.log(data);
                                        });

                                        return false;
                                    });


                            </script>


                            <li>
                                <div class="clearfix tb-btn tb-btn-basket theme-login">
                                    <a id="LikBasket" title="加入购物车" href="">
                                        <i>
                                        </i>
                                        加入购物车
                                    </a>
                                </div>

                                <script type="text/javascript">

                                      var goodsattr = $('.sku-line,.selected').attr('attr')
                                       $('.sku-line,.selected').click(function(){
                                             goodsattr = $(this).attr('attr');
                                           
                                        })
                                	$('#LikBasket').click(function(){
                                		var sid = $('#sid').val();
                                		var num = $('#text_box').val();
                                		var arr = [];

                                		arr[0] = sid;
                                		arr[1] = num;
                                        arr[2] = goodsattr;
                                        console.log(arr);
                                		$.get('/home/cartadd',{arr:arr},function(data){

                                	           console.log(data);

                                		});

                                		return false;
                                	})
                                </script>
                            </li>
                        </div>
                    </div>
                    <div class="clear">
                    </div>
                </div>
                <!--优惠套装-->
              
                <div class="clear">
                </div>
                <!-- introduce-->
                <div class="introduce">
                    <div class="browse">
                        <div class="mc">
                            <ul>
                                <div class="mt">
                                    <h2>
                                        看了又看
                                    </h2>
                                </div>
                                <li class="first">
                                    <div class="p-img">
                                        <a href="#">
                                            <img class="" src="/home/images/browse1.jpg">
                                        </a>
                                    </div>
                                    <div class="p-name">
                                        <a href="#">
                                            【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                                        </a>
                                    </div>
                                    <div class="p-price">
                                        <strong>
                                            ￥35.90
                                        </strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-img">
                                        <a href="#">
                                            <img class="" src="/home/images/browse1.jpg">
                                        </a>
                                    </div>
                                    <div class="p-name">
                                        <a href="#">
                                            【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                                        </a>
                                    </div>
                                    <div class="p-price">
                                        <strong>
                                            ￥35.90
                                        </strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-img">
                                        <a href="#">
                                            <img class="" src="/home/images/browse1.jpg">
                                        </a>
                                    </div>
                                    <div class="p-name">
                                        <a href="#">
                                            【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                                        </a>
                                    </div>
                                    <div class="p-price">
                                        <strong>
                                            ￥35.90
                                        </strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-img">
                                        <a href="#">
                                            <img class="" src="/home/images/browse1.jpg">
                                        </a>
                                    </div>
                                    <div class="p-name">
                                        <a href="#">
                                            【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
                                        </a>
                                    </div>
                                    <div class="p-price">
                                        <strong>
                                            ￥35.90
                                        </strong>
                                    </div>
                                </li>
                                <li>
                                    <div class="p-img">
                                        <a href="#">
                                            <img class="" src="/home/images/browse1.jpg">
                                        </a>
                                    </div>
                                    <div class="p-name">
                                        <a href="#">
                                            【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
                                        </a>
                                    </div>
                                    <div class="p-price">
                                        <strong>
                                            ￥35.90
                                        </strong>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="introduceMain">
                        <div class="am-tabs" data-am-tabs>
                            <ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active">
                                    <a href="#">
                                        <span class="index-needs-dt-txt">
                                            宝贝详情
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="index-needs-dt-txt">
                                            全部评价
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="index-needs-dt-txt">
                                            猜你喜欢
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div class="am-tabs-bd">
                                <div class="am-tab-panel am-fade am-in am-active">
                                    <div class="J_Brand">
                                        <li id="J_AttrUL">
                                            <img src="/home/images/T1DiulXX0sXXXXXXXX-16-17.png" style="width: 15px">
                                            商品具有
                                            <a target="_blank" href="//baike.taobao.com/view.htm?tp=18&amp;wd=SC11834020305037">
                                                <b style="color:#35a">
                                                    生产许可证编号
                                                </b>
                                            </a>
                                            ，符合食品质量安全准入标准。
                                        </li>
                                        <div class="attr-list-hd tm-clear">
                                            <h4>
                                                产品参数：
                                            </h4>
                                        </div>
                                        <div class="clear">
                                        </div>
                                        <ul id="J_AttrUL">
                                            <li title="">
                                                生产许可证编号:&nbsp;SC11834020305037
                                            </li>
                                            <li title="">
                                                产品标准号:&nbsp;GB 19300
                                            </li>
                                            <li title="">
                                                厂名:&nbsp;三只松鼠股份有限公司
                                            </li>
                                            <li title="">
                                                厂址:&nbsp;安徽省芜湖市弋江区芜湖高新技术...
                                            </li>
                                            <li title="">
                                                厂家联系方式:&nbsp;400-800-4900
                                            </li>
                                            <li title="">
                                                配料表:&nbsp;扁核桃，白砂糖，食用盐，甜炼...
                                            </li>
                                            <li title="">
                                                储藏方法:&nbsp;请置于阴凉干燥处
                                            </li>
                                            <li title="">
                                                保质期：&nbsp;240 天
                                            </li>
                                            <li title="">
                                                食品添加剂：&nbsp;甜蜜素，安赛蜜，糖精钠
                                            </li>
                                            <li title="">
                                                包装方式：&nbsp;包装
                                            </li>
                                            <li title="">
                                                品牌：&nbsp; Three Squirrels/三只松鼠
                                            </li>
                                            <li title="">
                                                产地：&nbsp;中国大陆
                                            </li>
                                            <li title="">
                                                是否新货：&nbsp;是
                                            </li>
                                        </ul>
                                        <div class="clear">
                                        </div>
                                    </div>
                                    <div class="details">
                                        <div class="attr-list-hd after-market-hd">
                                            <h4>
                                                商品细节
                                            </h4>
                                        </div>
                                        <div class="twlistNews">
                                            {!! $data->desc !!}
                                        </div>
                                    </div>
                                    <div class="clear">
                                    </div>
                                </div>
                                <div class="am-tab-panel am-fade">
                                    <div class="actor-new">
                                        <div class="rate">
                                            <strong>
                                                100
                                                <span>
                                                    %
                                                </span>
                                            </strong>
                                            <br>
                                            <span>
                                                好评度
                                            </span>
                                        </div>
                                        <dl>
                                            <dt>
                                                买家印象
                                            </dt>
                                            <dd class="p-bfc">
                                                <q class="comm-tags">
                                                    <span>
                                                        味道不错
                                                    </span>
                                                    <em>
                                                        (2177)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        颗粒饱满
                                                    </span>
                                                    <em>
                                                        (1860)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        口感好
                                                    </span>
                                                    <em>
                                                        (1823)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        商品不错
                                                    </span>
                                                    <em>
                                                        (1689)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        香脆可口
                                                    </span>
                                                    <em>
                                                        (1488)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        个个开口
                                                    </span>
                                                    <em>
                                                        (1392)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        价格便宜
                                                    </span>
                                                    <em>
                                                        (1119)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        特价买的
                                                    </span>
                                                    <em>
                                                        (865)
                                                    </em>
                                                </q>
                                                <q class="comm-tags">
                                                    <span>
                                                        皮很薄
                                                    </span>
                                                    <em>
                                                        (831)
                                                    </em>
                                                </q>
                                            </dd>
                                        </dl>
                                    </div>
                                    <div class="clear">
                                    </div>
                                    <div class="tb-r-filter-bar">
                                        <ul class=" tb-taglist am-avg-sm-4">
                                            <li class="tb-taglist-li tb-taglist-li-current">
                                                <div class="comment-info">
                                                    <span>
                                                        全部评价
                                                    </span>
                                                    <span class="tb-tbcr-num">
                                                        (32)
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="tb-taglist-li tb-taglist-li-1">
                                                <div class="comment-info">
                                                    <span>
                                                        好评
                                                    </span>
                                                    <span class="tb-tbcr-num">
                                                        (32)
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="tb-taglist-li tb-taglist-li-0">
                                                <div class="comment-info">
                                                    <span>
                                                        中评
                                                    </span>
                                                    <span class="tb-tbcr-num">
                                                        (32)
                                                    </span>
                                                </div>
                                            </li>
                                            <li class="tb-taglist-li tb-taglist-li--1">
                                                <div class="comment-info">
                                                    <span>
                                                        差评
                                                    </span>
                                                    <span class="tb-tbcr-num">
                                                        (32)
                                                    </span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear">
                                    </div>
                                    <ul class="am-comments-list am-comments-list-flip">
                                        <li class="am-comment">
                                            <!-- 评论容器 -->
                                            <a href="">
                                                <img class="am-comment-avatar" src="/home/images/hwbn40x40.jpg" />
                                                <!-- 评论者头像 -->
                                            </a>
                                            <div class="am-comment-main">
                                                <!-- 评论内容容器 -->
                                                <header class="am-comment-hd">
                                                    <!--<h3 class="am-comment-title">评论标题</h3>-->
                                                    <div class="am-comment-meta">
                                                        <!-- 评论元数据 -->
                                                        <a href="#link-to-user" class="am-comment-author">
                                                            b***1 (匿名)
                                                        </a>
                                                        <!-- 评论者 -->
                                                        评论于
                                                        <time datetime="">
                                                            2015年11月02日 17:46
                                                        </time>
                                                    </div>
                                                </header>
                                                <div class="am-comment-bd">
                                                    <div class="tb-rev-item " data-id="255776406962">
                                                        <div class="J_TbcRate_ReviewContent tb-tbcr-content ">
                                                            摸起来丝滑柔软，不厚，没色差，颜色好看！买这个衣服还接到诈骗电话，我很好奇他们是怎么知道我买了这件衣服，并且还知道我的电话的！
                                                        </div>
                                                        <div class="tb-r-act-bar">
                                                            颜色分类：柠檬黄&nbsp;&nbsp;尺码：S
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- 评论内容 -->
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="clear">
                                    </div>
                                    <!--分页 -->
                                    <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled">
                                            <a href="#">
                                                &laquo;
                                            </a>
                                        </li>
                                        <li class="am-active">
                                            <a href="#">
                                                1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                4
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                5
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                &raquo;
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clear">
                                    </div>
                                    <div class="tb-reviewsft">
                                        <div class="tb-rate-alert type-attention">
                                            购买前请查看该商品的
                                            <a href="#" target="_blank">
                                                购物保障
                                            </a>
                                            ，明确您的售后保障权益。
                                        </div>
                                    </div>
                                </div>
                                <div class="am-tab-panel am-fade">
                                    <div class="like">
                                        <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="i-pic limit">
                                                    <img src="/home/images/imgsearch1.jpg" />
                                                    <p>
                                                        【良品铺子_开口松子】零食坚果特产炒货
                                                        <span>
                                                            东北红松子奶油味
                                                        </span>
                                                    </p>
                                                    <p class="price fl">
                                                        <b>
                                                            ¥
                                                        </b>
                                                        <strong>
                                                            298.00
                                                        </strong>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clear">
                                    </div>
                                    <!--分页 -->
                                    <ul class="am-pagination am-pagination-right">
                                        <li class="am-disabled">
                                            <a href="#">
                                                &laquo;
                                            </a>
                                        </li>
                                        <li class="am-active">
                                            <a href="#">
                                                1
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                2
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                3
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                4
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                5
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                &raquo;
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="clear">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear">
                        </div>

                    
<script type="text/javascript">
            $(function(){
               $('#LikBasket').shoping({
                    endElement:"#ceshi",
                    iconImg:"/home/images/cart.png",
                    endFunction:function(element){
                        $(".cart_num").html(parseInt($(".cart_num").html())+1);
                        console.log(element);
                        return false;
                    }
                })
            });
</script>
        
    </body>

@endsection