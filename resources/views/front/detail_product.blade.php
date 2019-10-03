@extends('frontlayout.front_Design')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ url('/index') }}">Home</a></li>
				<li><a href="{{ url('/product') }}">Products</a></li>
				<li><a href="#">{{ $productDetails->category->name }}</a></li>
				<li class="active">{{ $productDetails->name }}</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			@if(Session::has('flash_message_error'))
			<div class="alert alert-danger" role="alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{!! session('flash_message_error') !!}</strong>
			</div>
			@endif    
			@if(Session::has('flash_message_success'))
			<div class="alert alert-success" role="alert-block">
				<button type="button" class="close" data-dismiss="alert">x</button>
				<strong>{!! session('flash_message_success') !!}</strong>
			</div>
			@endif      
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{asset('data_file/'.$productDetails->foto)}}" width="50px" height="500px" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<form action="{{ url('/add-cart/'.$productDetails->id) }}" method="post">
							@csrf
						<div class="product-body">
							<h2 class="product-name">{{ $productDetails->name }}</h2>
							<h3 class="product-price">${{ $productDetails->harga }}</h3>
							
							<p><strong>Availability:</strong> 
								@foreach($size as $sze)
									<?php echo "$sze->size : $sze->amount" ?>
									@endforeach

							</p>
							<p><strong>Brand:</strong> {{ $productDetails->brand->name }}</p>
							<p>{{ $productDetails->description }}</p>
							<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									@foreach($size as $sze)
									<li> <input type="radio" name="id_size" value="{{$sze->id}}"> {{$sze->size}}</li>
									@endforeach
								</ul>
							</div>

							<div class="product-btns">
							
								
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</form>
							</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection