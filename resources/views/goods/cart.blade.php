@extends('public.public')
@section('title', '购物车')
@section('content')

	<!-- cart -->
	<div class="cart section">
		<div class="container">
			<div class="pages-head">
				<h3>购物车</h3>
			</div>
			<div class="content">
				@foreach ($data as $k => $v)
					<div class="cart-1">
					<div class="row">
						<div class="col s5">
							<h5>Image</h5>
						</div>
						<div class="col s7">
							<img src="img/{{$v->goods_img}}" alt="">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Name</h5>
						</div>
						<div class="col s7">
							<h5><a href="">Fashion Men's</a></h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Quantity</h5>
						</div>
						<div class="col s7">
							<input value="1" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Price</h5>
						</div>
						<div class="col s7">
							<h5>$20</h5>
						</div>
					</div>
					<div class="row">
						<div class="col s5">
							<h5>Action</h5>
						</div>
						<div class="col s7">
							<h5><i class="fa fa-trash"></i></h5>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				@endforeach
				
				
			</div>
			<div class="total">
				<div class="row">
					<div class="col s7">
						<h5>Fashion Men's</h5>
					</div>
					<div class="col s5">
						<h5>$21.00</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s7">
						<h5>Fashion Men's</h5>
					</div>
					<div class="col s5">
						<h5>$20.00</h5>
					</div>
				</div>
				<div class="row">
					<div class="col s7">
						<h6>Total</h6>
					</div>
					<div class="col s5">
						<h6>$41.00</h6>
					</div>
				</div>
			</div>
			<button class="btn button-default">Process to Checkout</button>
		</div>
	</div>
	<!-- end cart -->

@endsection