@extends('public.public')
@section('title', '商品列表')
@section('content')

<!-- product -->
	<div class="section product product-list">
		<div class="container">
			<div class="pages-head">
				<h3>PRODUCT LIST</h3>
			</div>
			<div class="input-field">
				<select>
					<option value="">Popular</option>
					<option value="1">New Product</option>
					<option value="2">Best Sellers</option>
					<option value="3">Best Reviews</option>
					<option value="4">Low Price</option>
					<option value="5">High Price</option>
				</select>
			</div>
			<div class="row">
				@foreach ($data as $k => $v)
					<div class="col s6">
						<div class="content">
							<a href="shop-single?goods_id={{$v->goods_id}}"><img src="img/{{$v->goods_img}}"
							alt=""  width="566.37" height="566.37"></a>
							<h6>{{$v->goods_name}}</h6>
							<div class="price">
								￥{{$v->shop_price}} <span>￥{{$v->market_price}}</span>
							</div>
							<button class="btn button-default">添加到购物车</button>
						</div>
					</div>
				@endforeach
				
				
			</div>
				
			<div class="pagination-product">
				{{$data->links()}}
			</div>
		</div>
	</div>
	<!-- end product -->
@endsection