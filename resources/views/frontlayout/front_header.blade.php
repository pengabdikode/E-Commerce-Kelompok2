	<!-- HEADER -->
	<header>

		<!-- header -->
		<div id="header">
			<div class="container">
				@guest
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{ url('/index') }}">
							<img src="{{asset('images/frontend_images/logo.png')}}" alt="">
						</a>
					</div>
					<!-- /Logo -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							
							<ul class="custom-menu">
								<li><a href="{{ url('/guest/register') }}"><i class="fa fa-user-plus"></i> Create An Account</a></li>
								<li><a href="{{ url('/e-shop/login') }}" class="text-uppercase"> <i class="fa fa-unlock-alt"></i> Login</a></li>
								
							</ul>
						</li>
				@else
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="{{ url('/index') }}">
							<img src="{{asset('images/frontend_images/logo.png')}}" alt="">
						</a>
					</div>
					<!-- /Logo -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></strong>
							</div>

							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="{{ url('/logout') }}" class="text-uppercase"> <i class="fa fa-unlock-alt"></i> Logout</a></li>
								
							</ul>
						</li>
						@endguest
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{ $carts->count() }}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>${{$total}}</span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
								
								@foreach($carts as $crt)
								
										<div class="product product-widget">
											<div class="product-thumb">
												<img src="{{ asset('data_file/'.$crt->attributes->photo) }}" alt="">
											</div>
											<div class="product-body">
												<h3 class="product-price">${{ $crt->price }} <span class="qty">X {{ $crt->quantity }}</span></h3>
												<h2 class="product-name"><a href="#">{{ $crt->name }}</a></h2>
											</div>
											<form action="{{ url('/remove-from-cart/'.$crt->id) }}">
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</form>
										</div>
									@endforeach
									</div>
									<div class="shopping-cart-btns">

										<a href="{{ url('/cart') }}">
										<button class="main-btn">View Cart</button>
										</a>

										<a href="{{ url('/checkout') }}">
										<button type="submit" class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
										</a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
