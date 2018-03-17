<div class="top">
					<div class="container">
						
							
							<div class="col-md-6 top-middle">
								<ul>
									<li><a target="_blank" href="https://www.facebook.com/AmirMataHati"><i class="fa fa-facebook"></i></a></li>
									<li><a trget="_blank" href="https://twitter.com/AmirMataHati"><i class="fa fa-twitter"></i></a></li>
									<li><a target="_blank" href="https://plus.google.com/u/0/112364702243448725324"><i class="fa fa-google-plus"></i></a></li>
									<li><a target="_blank" href="https://www.linkedin.com/in/amirmatahati/"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="col-md-6 top-left">
								<ul>
									<li><i class="fa fa-mobile" aria-hidden="true"></i> +021 365 777</li>
									<li><i class="fa fa-map-marker" aria-hidden="true"></i> 132 New Lenox, 868 1st Avenue </li>
								</ul>
							</div>
							<div class="clearfix"></div>
						
					</div>
				</div>
				<div class="top-bar">
				<div class="container">
					<div class="header">
						<nav class="navbar navbar-default">
							<div class="navbar-header navbar-left">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<h1><a class="navbar-brand" href="index.html">Travel Agency</span></a></h1>
							</div>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
								<nav class="cl-effect-15" id="cl-effect-15">
									<ul class="nav navbar-nav">
										<li class="active"><a href="{{ url('/') }}">Home</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="{{ url('/booking')}}">Booking</a></li>
										<li><a href="{{ url('/galleries')}}">Gallery</a></li>
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-hover="Wisata" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Wisata <span class="caret"></span></a>
											<ul class="dropdown-menu">
											<?php
												use App\Models\MCategoryGalleries;
												$menu				= MCategoryGalleries::all();
											?>
											@foreach($menu as $views)
												<li><a href="{{ route('travelingyuk', $views->category_alias)}}">{{ $views->category_name}}</a></li>
											@endforeach
											</ul>
										</li>
									</ul>
									
								</nav>
							</div>
						</nav>
				</div>
			</div>
		</div>