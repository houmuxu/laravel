@extends('common.home')
@section('title', $title)
@section('content')
<<<<<<< HEAD
<<<<<<< HEAD
			


=======

			<!-- </div> -->
>>>>>>> origin/hou
=======
			


>>>>>>> origin/zhang
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/3.png" style="width: 1020px;height: 455px" />
									</a>
								</li>
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/1.png" style="width: 1000px;height: 400px" />
									</a>
								</li>						
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/4.png" style="width: 1000px;height: 440px;margin-top: 20px" />
									</a>
								</li>
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/9.png" style="width: 1000px;height: 430px;margin-top:20px" />
									</a>
								</li>
								<li class="banner1" style="background: white;">
									<a>
										<img src="/home/first/5.png" style="width: 1000px;height: 455px;margin-top:-20px" />
									</a>
								</li>
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/6.png" style="width: 1000px;height: 473px;margin-top:-40px" />
									</a>
								</li>
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/8.png" style="width: 1000px;height: 390px;margin-top:30px;" />
									</a>
								</li>
								<li class="banner1" style="background: white">
									<a>
										<img src="/home/first/10.png" style="width: 1000px;height: 480px;margin-top:-20px;" />
									</a>
								</li>								
							</ul>
						</div>
						<div class="clear"></div>	
			</div>
			<div class="shopNav">
				<div class="slideall">
					
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="/">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						</div>
		        		
						<!--侧边导航 -->
						<div id="nav" class="navfull">
							<div class="area clearfix">
								<div class="category-content" id="guide_2">
									
									<div class="category">
										<ul class="category-list" id="js_climit_li">
											<!-- 点心 -->
											@foreach($data as $k=>$v)
											<li class="appliance js_toggle relative first">
												<div class="category-info">
													<h3 class="category-name b-category-name"><i><img src="/home/images/cake.png"></i><a class="ml-22" href="/home/goodslist/{{$v->cid}}" title="{{$v->cname}}">{{$v->cname}}</a></h3>
													<em>&gt;</em></div>
												<div class="menu-item menu-in top">
													<div class="area-in">
														<div class="area-bg">
															<div class="menu-srot">
																<div class="sort-side">
																	@foreach($v->sub as $kk=>$vv)
																	<dl class="dl-sort">
																		<dt><span title="{{$vv->cname}}"><a href="/home/goodslist/{{$vv->cid}}">{{$vv->cname}}</a></span></dt>
																		@foreach($vv->sub as $kkk=>$vvv)
																		<dd><a title="{{$vvv->cname}}" href="/home/goodsshow/{{$vvv->goodss[0]->gid}}"><span>{{$vvv->cname}}</span></a></dd>
																		@endforeach
																		
																	</dl>
																	@endforeach
																
																</div>
																<div class="brand-side">
																	<dl class="dl-sort"><dt><span>实力商家</span></dt>
																		<dd><a rel="nofollow" title="三只松鼠官方网站" target="_blank" href="http://www.3songshu.com/" rel="nofollow"><span  class="red" >三只松鼠官方网站</span></a></dd>
																		<dd><a rel="nofollow" title="百草味旗舰店" target="_blank" href="https://baicaowei.tmall.com/search.htm" rel="nofollow"><span >百草味旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="良品铺子旗舰店" target="_blank" href="https://liangpinpuzi.tmall.com/view_shop.htm?spm=a220m.1000858.0.0.22797422F51m1O&shop_id=63552270&rn=249bd7f34d536a1d29b12f6864bb2f0b" rel="nofollow"><span  class="red" >良品铺子旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="熊孩子食品旗舰店" target="_blank" href="https://xionghaizisp.tmall.com/search.htm?spm=a220m.1000858.1000725.174.5ab7188ephfMb8&user_number_id=1872810511&rn=9b68ae43b9618002758c2750bf5d72a3&keyword=%C1%E3%CA%B3" rel="nofollow"><span >熊孩子食品旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="百事集团官方旗舰店" target="_blank" href="https://pepsico.tmall.com/search.htm?spm=a220m.1000858.1000725.231.5ab7188ephfMb8&user_number_id=1893751150&rn=9b68ae43b9618002758c2750bf5d72a3&keyword=%C1%E3%CA%B3" rel="nofollow"><span  class="red" >百事集团官方旗舰店</span></a></dd>
																		<dd><a rel="nofollow" title="天猫超市" target="_blank" href="https://chaoshi.tmall.com/?spm=a220m.1000858.1000725.13.5ab7188ephfMb8&user_number_id=725677994&rn=9b68ae43b9618002758c2750bf5d72a3&keyword=%C1%E3%CA%B3" rel="nofollow"><span  class="red" >天猫超市</span></a></dd>
																	</dl>
																</div>
															</div>
														</div>
													</div>
												</div>
											<b class="arrow"></b>	
											</li>
											@endforeach										
										</ul>
									</div>
								</div>

							</div>
						</div>
						
						<!--轮播 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="/home/images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="/home/images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>
<<<<<<< HEAD
=======

					<!--走马灯 -->

				<!-- 	<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="/home/images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="/home/images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="../person/index.html">
									<img src="/home/images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name">小叮当</span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
								<a class="am-btn-warning btn" href="login.html">登录</a>
								<a class="am-btn-warning btn" href="register.html">注册</a>
							</div>
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="/home/images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div> -->
>>>>>>> origin/zhang
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg" style="margin-top: 30px">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="am-u-sm-4 am-u-lg-3 " style="margin-left: 40px;width:200px">
							<div class="recommendationMain one" style="width:200px">
								<a href="/home/goodslist/5"><img src="/home/first/a1.png " style="width:200px;"></img></a>
							</div>
						</div>

						<div class="am-u-sm-4 am-u-lg-3 " style="margin-left: 40px;width:200px">
							<div class="recommendationMain one" style="width:200px">
								<a href="/home/goodslist/7"><img src="/home/first/a2.png " style="width:200px;"></img></a>
							</div>
						</div>	

						<div class="am-u-sm-4 am-u-lg-3 " style="margin-left: 40px;width:200px">
							<div class="recommendationMain one" style="width:200px">
								<a href="/home/goodslist/3"><img src="/home/first/a3.png " style="width:200px;"></img></a>
							</div>
						</div>	

						<div class="am-u-sm-4 am-u-lg-3 " style="margin-left: 40px;width:200px">
							<div class="recommendationMain one" style="width:200px">
								<a href="/home/goodslist/4"><img src="/home/first/a4.png " style="width:200px;"></img></a>
							</div>
						</div>	
						<div class="am-u-sm-4 am-u-lg-3 " style="margin-left: 40px;width:200px">
							<div class="recommendationMain one" style="width:200px">
								<a href="/home/goodslist/10"><img src="/home/first/a5.png " style="width:200px;"></img></a>
							</div>
						</div>	

					</div>
				</div>					
				</div>
					<div class="clear "></div>

					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                               <a href="# ">全部活动<i class="am-icon-angle-right" style="padding-left:10px ;" ></i></a>
                            </span>
						</div>
					
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<a href=""><img src="/home/images/activity1.jpg "></img></a>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="/home/images/activity2.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="/home/images/activity3.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="/home/images/activity.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div>

					  </div>
                   </div>
					<div class="clear "></div>
				<!-- 商品下拉列表 -->
		@foreach($data as $k=>$v)
			 <div class="f1">
					<!--一级分类-->
					
					<div class="am-container " >
						<div class="shopTitle ">
							<h4 class="floor-title">{{$v->cname}}</h4>
							<div class="floor-subtitle"><h3>每一个{{$v->cname}}都有一个故事</h3></div>
							<div class="today-brands " style="right:0px ;top:13px;">
								|@foreach($v->sub as $kk=>$vv)
								<a href="/home/goodslist/{{$vv->cid}}">{{$vv->cname}}</a>|
								@endforeach

							</div>

						</div>
					</div>
<<<<<<< HEAD

=======
>>>>>>> origin/zhang
				<!-- //首页商品列表 -->
					<div class="am-g am-g-fixed floodSix ">				
						<div class="am-u-sm-5 am-u-md-3 text-one list">
							<div class="word">
							<img src="/home/first/slogo.png" style=" position: relative;left: -11px;top: -135px;width: 200px">
							</div>							
<<<<<<< HEAD
							<a href="/home/goodsshow/{{$arr[$k][0]->goodss[0]->gid}}">
								<img src="{{$arr[$k][0]->goodss[0]->goodspics[0]->gpic}}" />

								<div class="outer-con ">
									<div class="title ">
										{{$arr[$k][0]->cname}}
																			
									</div>								
									<div class="sub-title ">						

										超级好吃的{{$arr[$k][0]->cname}}
										
=======
							<a href="/home/goodsshow/<?php
											echo $v->sub[0]->sub[0]->goodss[0]->gid
										?>">
								<img src="<?php
											echo $v->sub[0]->sub[0]->goodss[0]->goodspics[0]->gpic;
										?>" />
								<div class="outer-con ">
									<div class="title ">
										<?php
											echo $v->sub[0]->sub[0]->cname;
										?>									
									</div>								
									<div class="sub-title ">						

										<?php
											echo '超级好吃的'.$v->sub[0]->sub[0]->cname;
										?>
>>>>>>> origin/zhang

									</div>
								</div>
							</a>
							<div class="triangle-topright"></div>	
						</div>
						
						<div class="am-u-sm-7 am-u-md-5 am-u-lg-2 text-two big">

							
								<div class="outer-con ">
									<div class="title ">
<<<<<<< HEAD
										{{$arr[$k][1]->cname}}
									</div>
									<div class="sub-title ">
										{{$arr[$k][1]->goodss[0]->price}}
									</div>
									
								</div>
								<a href="/home/goodsshow/{{$arr[$k][1]->goodss[0]->gid}}">
										<img src="{{$arr[$k][1]->goodss[0]->goodspics[0]->gpic}}" /></a>						
=======
										<?php
											echo $v->sub[0]->sub[1]->cname;
										?>
									</div>
									<div class="sub-title ">
										<?php
											echo $v->sub[0]->sub[1]->goodss[0]->price
										?>
									</div>
									
								</div>
								<a href="/home/goodsshow/<?php
											echo $v->sub[0]->sub[1]->goodss[0]->gid
										?> ">
										<img src="<?php
											echo $v->sub[0]->sub[1]->goodss[0]->goodspics[0]->gpic;
										?>" /></a>						
>>>>>>> origin/zhang
						</div>

						<li>
						<div class="am-u-md-2 am-u-lg-2 text-three">
							<div class="boxLi"></div>
							<div class="outer-con ">
								<div class="title ">
<<<<<<< HEAD
									{{$arr[$k][2]->cname}}
								</div>								
								<div class="sub-title ">
									{{$arr[$k][2]->goodss[0]->price}}
								</div>
								
							</div>
							<a href="/home/goodsshow/{{$arr[$k][2]->goodss[0]->gid}}">
							<img src="{{$arr[$k][2]->goodss[0]->goodspics[0]->gpic}} "/>
=======
									<?php
											echo $v->sub[0]->sub[2]->cname;
									?>
								</div>								
								<div class="sub-title ">
									<?php
											echo $v->sub[0]->sub[2]->goodss[0]->price
									?>
								</div>
								
							</div>
							<a href="/home/goodsshow/<?php echo $v->sub[0]->sub[2]->goodss[0]->gid?>">
							<img src="<?php echo $v->sub[0]->sub[2]->goodss[0]->goodspics[0]->gpic;?> "/>
>>>>>>> origin/zhang
							</a>
						</div>
						</li>
						<li>
						<div class="am-u-md-2 am-u-lg-2 text-three sug">
							<div class="boxLi"></div>
							<div class="outer-con ">
								<div class="title ">
<<<<<<< HEAD
									{{$arr[$k][3]->cname}}
								</div>
								<div class="sub-title ">
									{{$arr[$k][3]->goodss[0]->price}}
								</div>
								
							</div>
							<a href="/home/goodsshow/{{$arr[$k][3]->goodss[0]->gid}}">
								<img src="{{$arr[$k][3]->goodss[0]->goodspics[0]->gpic}}"/>
=======
									<?php
											echo $v->sub[0]->sub[3]->cname;
									?>
								</div>
								<div class="sub-title ">
									<?php
											echo $v->sub[0]->sub[3]->goodss[0]->price
									?>
								</div>
								
							</div>
							<a href="/home/goodsshow/<?php echo $v->sub[0]->sub[3]->goodss[0]->gid?>">
								<img src="<?php echo $v->sub[0]->sub[3]->goodss[0]->goodspics[0]->gpic;?> "/>
>>>>>>> origin/zhang
							</a>
						</div>
						</li>
						<li>
						<div class="am-u-sm-4 am-u-md-5 am-u-lg-4 text-five">
							<div class="boxLi"></div>
							<div class="outer-con ">
								<div class="title ">
<<<<<<< HEAD
									{{$arr[$k][4]->cname}}
								</div>								
								<div class="sub-title ">
									{{$arr[$k][4]->goodss[0]->price}}
								</div>
								
							</div>
							<a href="/home/goodsshow/{{$arr[$k][4]->goodss[0]->gid}}">
								<img src="{{$arr[$k][4]->goodss[0]->goodspics[0]->gpic}}"/>
=======
									<?php
											echo $v->sub[0]->sub[4]->cname;
									?>
								</div>								
								<div class="sub-title ">
									<?php
											echo $v->sub[0]->sub[4]->goodss[0]->price
									?>
								</div>
								
							</div>
							<a href="/home/goodsshow/<?php echo $v->sub[0]->sub[4]->goodss[0]->gid?>">
								<img src="<?php echo $v->sub[0]->sub[4]->goodss[0]->goodspics[0]->gpic;?> "/>
>>>>>>> origin/zhang
							</a>
						</div>	
						</li>
						<li>
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-2 text-six">
							<div class="boxLi"></div>
							<div class="outer-con ">
								<div class="title ">
<<<<<<< HEAD
									{{$arr[$k][5]->cname}}
								</div>
								<div class="sub-title ">
									{{$arr[$k][5]->goodss[0]->price}}
								</div>
								
							</div>
							<a href="/home/goodsshow/{{$arr[$k][5]->goodss[0]->gid}}">
								<img src="{{$arr[$k][5]->goodss[0]->goodspics[0]->gpic}}" />
=======
									<?php
											echo $v->sub[0]->sub[5]->cname;
									?>
								</div>
								<div class="sub-title ">
									<?php
											echo $v->sub[0]->sub[5]->goodss[0]->price
									?>
								</div>
								
							</div>
							<a href="/home/goodsshow/<?php echo $v->sub[0]->sub[5]->goodss[0]->gid?>">
								<img src="<?php echo $v->sub[0]->sub[5]->goodss[0]->goodspics[0]->gpic;?> " />
>>>>>>> origin/zhang
							</a>
						</div>	
						</li>
						<li>
						<div class="am-u-sm-4 am-u-md-2 am-u-lg-4 text-six">
							<div class="boxLi"></div>
							<div class="outer-con ">
								<div class="title ">
<<<<<<< HEAD
									{{$arr[$k][6]->cname}}
								</div>
								<div class="sub-title ">
									{{$arr[$k][6]->goodss[0]->price}}
								</div>
								
							</div>
							<a href="/home/goodsshow/{{$arr[$k][6]->goodss[0]->gid}}">
								<img src="{{$arr[$k][6]->goodss[0]->goodspics[0]->gpic}}" />
							</a>
=======
									<?php
											echo $v->sub[0]->sub[6]->cname;
									?>
								</div>
								<div class="sub-title ">
									<?php
											echo $v->sub[0]->sub[6]->goodss[0]->price
									?>
								</div>
								
							</div>
							<a href="/home/goodsshow/<?php echo $v->sub[0]->sub[6]->goodss[0]->gid?>"><img src="<?php echo $v->sub[0]->sub[6]->goodss[0]->goodspics[0]->gpic;?> " /></a>
>>>>>>> origin/zhang
						</div>	
						</li>						
					</div>

					<div class="clear "></div>
            </div>
        @endforeach

           		@endsection

