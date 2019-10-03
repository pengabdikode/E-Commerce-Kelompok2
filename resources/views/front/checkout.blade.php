@extends('frontlayout.front_Design')
@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
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

		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="{{ url('/checkout') }}" method="POST" id="checkout-form" class="clearfix">
						@csrf
						<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Bank</h4>
							</div>
							@foreach($bank as $banks)
							<div class="input-checkbox">
								<input type="radio" name="bank" id="shipping-1" value="{{ $banks->id }}">
								<label for="shipping-1">{{ $banks->name }}</label>
								
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-md-6">

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" value="cash" checked>
								<label for="payments-1">Cash</label>
								<div class="caption">
									<p>You will pay it directly,transfer your money to our bank account,thank you.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2" value="credit">
								<label for="payments-2">Credit</label>
								<div class="caption">
									<p>You will pay it everymonth to the bank that you use the service.
										<p>
								</div>
							</div>
						</div>
						<div class="pull-right">
								<button class="primary-btn">Place Order</button>
							</div>

					</div>
</form>
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
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
									<tr>
										<td class="thumb"><img src="./img/thumb-product01.jpg" alt=""></td>
										<td class="details">
											<a href="#">{{ $crt->name }}</a>
											<ul>
												<li><span>Size: @foreach($size as $sz)
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
											@endforeach readonly></td>
										<td class="total text-center"><strong class="primary-color">${{ $crt->quantity*$crt->price }}</strong></td>
										<td class="text-right"><a href="{{ url('/remove-from-cart/'.$crt->id) }}">
										<button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-close"></i></button>
									</a></td>
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
						</div>

					</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection