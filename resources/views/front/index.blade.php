@extends('frontlayout.front_Design')
@section('content')

<!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ url('/index') }}">Home</a></li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Brands</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./images/frontend_images/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">ALL<br>BRANDS</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							<!-- Product Single -->
							@foreach($brands as $brn)
							<div class="product product-single">
								<div class="product-thumb">
									<img src="{{asset('data_file/'.$brn->logo)}}" alt="">
								</div>
								<div class="product-body">
									<div class="product-btns">
										<form action="{{ url('viewby-product/'. 2 .'/'. $brn->id) }}">
										<button class="primary-btn add-to-cart"> View All Products</button>
									</form>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">CATEGORIES</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Banner -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="./images/frontend_images/banner15.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">AVAILABLE<br>CATEGORIES</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div>
				<!-- Banner -->

				<!-- Product Slick -->
				<div class="col-md-9 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
						<!-- Product Single -->
							@foreach($category as $categories)
							<div class="product product-single">
								<div class="product-thumb">
									<img src="{{asset('data_file/'.$categories->photo)}}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">{{ $categories->name }}</h3>
									<div class="product-btns">
									<form action="{{ url('viewby-product/'. 1 .'/'. $categories->id) }}">
										<button class="primary-btn add-to-cart"> View All Products</button>
									</form>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Product Single -->
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Products</h2>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach($pro as $prod)
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single">
						<div class="product-thumb">
							<img src="{{asset('data_file/'.$prod->foto)}}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">${{$prod->harga}}</h3>
							<h2 class="product-name"><a href="#">{{$prod->name}}</a></h2>
							<div class="product-btns">
							<form action="{{ url('/detail/'.$prod->id) }}">
							<button type="submit" class="primary-btn add-to-cart">View Detail</button>
							</form>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<!-- /Product Single -->
			</div>
			<!-- /row -->
			<div class="row">
				<div>{{ $pro->links() }}</div>
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection