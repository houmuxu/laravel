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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的收藏</strong> / <small>My&nbsp;Collection</small></div>
						</div>
						<hr/>

						<div class="you-like">
							
							<div class="s-content">

							@foreach($goods as $k=>$v)
								<div class="s-item-wrap">
									<div class="s-item">

										<div class="s-pic">
											<a href="/home/goodsshow/{{$v->gid}}" class="s-pic-link">
												<img src="{{$v->goodspics[0]->gpic}}" alt="{{$v->gname}}" title="{{$v->gname}}" class="s-pic-img s-guess-item-img">
											</a>
										</div>
										<div class="s-info">
											<div class="s-title"><a href="#" title="{{$v->gname}}">{{$v->gname}}</a></div>
											<div class="s-price-box">
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price}}</em></span>
												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v->price+3}}</em></span>
											</div>
											<div class="s-extra-box">
												<span class="s-comment">好评: {{$haopinglv[$k]}}%</span>
												<span class="s-sales">月销:{{$v->num}}</span>
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