@extends('frontlayout.front_Design')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Cart</li>
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

				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Cart</h3>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Product</th>
									<th></th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
								<?php $total = 0 ?>
								@foreach($carts as $crt)
								<?php $total += $crt->quantity*$crt->price ?>
								<form action="{{ url('/update-cart/'.$crt->id.'/'.$crt->attributes->id_size) }}" method="POST">
									@csrf
								<tr>
									<td class="thumb"><img src="{{ asset('data_file/'.$crt->attributes->photo) }}" alt=""></td>
									<td class="details">
										<a href="#">{{ $crt->name }}</a>
										<ul>
											<li><span>Size :
												@foreach($size as $sz)
												<?php if($crt->attributes->id_size == $sz->id){
													echo "$sz->size";
												} 
												
											?> 
											@endforeach

										</span></li>
										</ul>
									</td>
									<td class="price text-center"><strong>${{ $crt->price }}</strong></td>
									<td class="qty text-center"><input name="amount" class="input" type="number" value="{{ $crt->quantity }}" min = "1" 
										max=@foreach($size as $sz)
												<?php if($crt->attributes->id_size == $sz->id){
													echo "$sz->amount";
												} 
												
											?> 
											@endforeach></td>
									<td class="total text-center"><strong class="primary-color">${{ $crt->quantity*$crt->price }}</strong></td>
									<td class="text-right">
										<button class="btn btn-info btn-sm update-cart"><i class="fa fa-refresh"></i></button>
									</form>

									<a href="{{ url('/remove-from-cart/'.$crt->id) }}">
										<button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-close"></i></button>
									</a>
									</td>
								</tr>
								 @endforeach

							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total">${{ $total }}</th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<a href="{{ url('/checkout') }}">
								<button class="primary-btn">Checkout</button>
							</a>
						</div>
					</div>

				</div>
			
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->


@endsection