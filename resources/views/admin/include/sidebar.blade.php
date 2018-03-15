<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" class="site_title"><!--<i class="fa fa-paw"></i>--><img src="https://www.franchiseglobal.com/images/favicon.ico" width="30"> <span>FranchiseGlobal</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
				<img src="{{ asset('assets/bower_components/gentelella/production/images/img.jpg') }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
				<span><?php
					use App\Classes\UserClass;
					$userss = new UserClass();
					echo  $userss->GetPosition(Auth::user()->category_user);
				?></span>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
		<?php
			if (Auth::check()) {
		?>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
					<br />
					<br />
					<br />
					<li>
						<a href="{{ url('/list-pesawat')}}"><i class="fa fa-database" aria-hidden="true"></i> Pesawat</a>
					</li>
					<li>
						<a href="{{ url('/list-route')}}"><i class="fa fa-database" aria-hidden="true"></i> Rute</a>
					</li>
					<li>
						<a href="{{ url('/maskapai-list')}}"><i class="fa fa-database" aria-hidden="true"></i> Maskapai</a>
					</li>
					<li>
						<a href="{{ url('/gallery-list')}}"><i class="fa fa-database" aria-hidden="true"></i> Gallery</a>
					</li>
					<?php if (Auth::user()->category_user == 1){ ;?>
					<!--
					<li>
						<a><i class="fa fa fa-street-view" aria-hidden="true"></i> Marketing<span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li>
								<a>Offering <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li class="sub_menu"><a href="">Offer Package</a></li>
									<li><a href="">Member List Brokers</a></li>
									<li><a href="#level2_2">Marketing Franchise</a></li>
									<li><a href="#level2_2">Event</a></li>
								</ul>
							</li>
							<li><a href="">Salles Order</a></li>
							<li><a href="#">Commission</a></li>
						</ul>
					</li>
					-->
					<?php } ?>

                </ul>
            </div>


        </div>
		<?php } ?>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
			<a data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
