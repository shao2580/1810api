@extends('public.public')
@section('title', '首页')
@section('content')

@include('public.slider')	
   
	<!-- features 标志-->
	<div class="features section">
		<div class="container">
			<div class="row">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-car"></i>
						</div>
						<h6>Free Shipping</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-dollar"></i>
						</div>
						<h6>Money Back</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
			<div class="row margin-bottom-0">
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-lock"></i>
						</div>
						<h6>Secure Payment</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
				<div class="col s6">
					<div class="content">
						<div class="icon">
							<i class="fa fa-support"></i>
						</div>
						<h6>24/7 Support</h6>
						<p>Lorem ipsum dolor sit amet consectetur</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features -->

	<!-- quote 广告语-->
	<div class="section quote">
		<div class="container">
			<h4>FASHION UP TO 50% OFF</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid ducimus illo hic iure eveniet</p>
		</div>
	</div>
	<!-- end quote -->

	<!-- product 促销产品 -->
	<div class="section product">
		<div class="container">
			<div class="section-head">
				<h4>新品-促销</h4>
				<div class="divider-top"></div>
				<div class="divider-bottom"></div>
			</div>
			<div class="row">
			@foreach ($newData as $kk => $vv)
				
					<div class="col s6">
						<div class="content">
							<a href="blog-single?goods_id={{$vv->goods_id}}">
								<img src="img/{{$vv->goods_img}}" alt="" width="566.37" height="566.37">
							</a>
							<h6>{{$vv->goods_name}}</h6>
							<div class="price">
								￥{{$vv->shop_price}} <span>￥{{$vv->market_price}}</span>
							</div>
							<button class="btn button-default">添加到购物车</button>
						</div>
					</div>
	
			@endforeach 
			</div>
			
		</div>
	</div>
	<!-- end product -->

	<!-- promo  宣传广告-->
	<div class="promo section">
		<div class="container">
			<div class="content">
				<h4>PRODUCT BUNDLE</h4>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
				<button class="btn button-default">SHOP NOW</button>
			</div>
		</div>
	</div>
	<!-- end promo -->

	<!-- product 顶级商品  -->
	<div class="section product">
			<div class="container">
				<div class="section-head">		
					<h4>精品-商品</h4>
					<div class="divider-top"></div>
					<div class="divider-bottom"></div>
				</div>
			<div class="row">
				@foreach ($bestData as $k => $v)
					<div class="col s6">
						<div class="content">
							<a href="shop-single?goods_id={{$v->goods_id}}">
								<img src="img/{{$v->goods_img}}" alt="" width="566.37" height="566.37">
							</a>
							<h6>{{$v->goods_name}}</h6>
							<div class="price">
								￥{{$v->shop_price}} <span>￥{{$v->market_price}}</span>
							</div>
							<button class="btn button-default">添加到购物车</button>
						</div>
					</div>
				@endforeach 			
			</div>
			
			<div class="active pagination-product">			
				{{$bestData->links()}}  <!-- ->appends($query) -->
			</div>
		</div>
	</div>
	<!-- end product -->
	
@endsection