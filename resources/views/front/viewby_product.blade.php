@extends('frontlayout.front_Design')
@section('content')

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{ url('/index') }}">Home</a></li>
				<li><a href="{{ url('/product') }}">Products</a></li>
				<li class="active">{{ $show->name }}</li>
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
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">View by Brand</h3>
						<ul class="list-links">
							@foreach($brands as $brn)
							<li><a href="{{ url('viewby-product/'. 2 .'/'. $brn->id) }}">{{ $brn->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->

						<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">View by Categories</h3>
						<ul class="list-links">
							@foreach($category as $cat)
							<li><a href="{{ url('viewby-product/'. 1 .'/'. $cat->id) }}">{{ $cat->name }}</a></li>
							@endforeach
						</ul>
					</div>
					<!-- /aside widget -->
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-right">
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li>{{ $products->links() }}</li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
							@foreach($products as $prod)
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
										<button class="primary-btn add-to-cart">View Detail</button>
										</form>
										</div>
									</div>
								</div>
							</div>
							@endforeach
							<!-- /Product Single -->
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-right">
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">{{ $products->links() }}</li>
							</ul>
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

@endsection