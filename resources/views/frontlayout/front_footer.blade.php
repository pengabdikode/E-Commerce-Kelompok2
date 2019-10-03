<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<!-- footer logo -->
						<div class="footer-logo">
							<a class="logo" href="{{ url('/index') }}">
		            <img src="{{asset('images/frontend_images/logo.png') }}" alt="">
		          </a>
						</div>
						<!-- /footer logo -->

						<p>E-Shop is an online shop where you can buy clothes from your home without a need to go to the shop and what you buy will be delivered</p>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						@guest
						<h3 class="footer-header">Join Us!</h3>
						<ul class="list-links">
							<li><a href="{{ url('/e-shop/login') }}">Login</a></li>
							<li><a href="#">Register</a></li>
							@else
						<h3 class="footer-header">{{ Auth::user()->name }}</h3>
						<ul class="list-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Checkout</a></li>
							<li><a href="{{ url('/logout') }}">Logout</a></li>
							@endguest
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<div class="clearfix visible-sm visible-xs"></div>

				<!-- footer widget -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Customer Service</h3>
						<ul class="list-links">
							<li><a href="#">About Us</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
				</div>
				<!-- /footer widget -->

				<!-- footer subscribe -->
				<div class="col-md-3 col-sm-6 col-xs-6">
					<div class="footer">
						<h3 class="footer-header">Brands</h3>
						<ul class="list-links">
							@foreach($brands as $brd)
                  			<li><a href="{{ url('viewby-product/'. 2 .'/'. $brd->id) }}">{{  $brd->name }}</a></li>
                  			@endforeach
						</ul>
					</div>
				</div>
				<!-- /footer subscribe -->
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->