	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						@foreach($category as $cat)
                  		<li><a href="{{ url('viewby-product/'. 1 .'/'. $cat->id) }}">{{  $cat->name }}</a></li>
                  		@endforeach
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="{{ url('/index') }}">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="{{ url('/product') }}">Products</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Brands <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								@foreach($brands as $brd)
                  				<li><a href="{{ url('viewby-product/'. 2 .'/'. $brd->id) }}">{{  $brd->name }}</a></li>
                  				@endforeach
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->