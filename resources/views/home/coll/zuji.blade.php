@extends('common.geren')
@section('title', $title)


@section('content')
	<link href="/home/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
	<link href="/home/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
	<link href="/home/css/personal.css" rel="stylesheet" type="text/css">
	<link href="/home/css/colstyle.css" rel="stylesheet" type="text/css">

			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-collection">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的足迹</strong> / <small>My&nbsp;Footprint</small></div>
						</div>
						<hr/>

						<div class="you-like">
											
							<div class="s-content">

							@foreach($goods as $k=>$v)
								<div class="s-item-wrap">
									<div class="s-item">
										<div class="s-pic">
											<a href="/home/goodsshow/{{$v->gid}}">
												<img src="
												
									                 @php
														$gid = App\Model\Admin\Goodspic::where('gid',$v->gid)->first();
		            									echo $gpic = $gid->gpic;
	            									@endphp
									                  
									              
												" / width="200px">	
											</a>		
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$v->gname}}">{{$v->gname}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price+3}}</em></span>
											</div>
											<div class="s-extra-box">
												
												<span class="s-sales">月销:{{$v->num}}</span>
											</div>
										</div>
										<div class="s-tp">
										
										
										</div>
									</div>
								</div>
							@endforeach

							@foreach($sales as $k=>$v)
								<div class="s-item-wrap">
									<div class="s-item">
										<div class="s-pic">
											<a href="/home/show/{{$v->sid}}">
												<img src="
												
									                @php
														$gid = App\Model\Admin\Salespic::where('sid',$v->sid)->first();
									                  echo $salespic = $gid['salespic']; 
	            									@endphp
									                  
									              
												" / width="200px">	
											</a>		
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$v->gname}}">{{$v->gname}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->newprice}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->oldprice}}</em></span>
											</div>
											<div class="s-extra-box">
												
												<span class="s-sales">月销:{{$v->stock}}</span>
											</div>
										</div>
										<div class="s-tp">
										
										
										</div>
									</div>
								</div>
							@endforeach
							</div>
					

						</div>

					</div>

				</div>
				<!--底部-->
				@endsection