@extends('frontlayout.front_Design')
@section('content')
<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">{{ Auth::user()->name }} Profile</li>
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

				<div class="col-md-6">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">{{ Auth::user()->name }} Profile</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="first-name" placeholder="First Name">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="last-name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="postal_code" placeholder="Postal Code">
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone">
						</div>
						
						</div>
					</div>

					<div class="col-md-6">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Account</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="user_name" placeholder="User Name">
						</div>
						<div class="form-group">
							<input class="input" type="password" name="password" placeholder="Password">
						</div>
						
						</div>
						<div class="pull-right">
								<button class="primary-btn">Edit Profile</button>
						</div>
					</div>
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
@endsection