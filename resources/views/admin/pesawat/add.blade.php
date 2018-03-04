@extends('admin.layouts.app')
@section('content')

	<div class="right_col" role="main">
		<div class="page-title">
			<div class="title_left">
					<h3>Add Address</h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
						  <button class="btn btn-default" type="button">Go!</button>
						</span>
                  </div>
                </div>
			</div>
        </div>
		
		<div class="clearfix"></div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<div class="row">
							<div class="col-md-6">
								<div class="btn-group btn-breadcrumb">
									<a href="{{ url('/') }}" class="btn btn-default"><i class="glyphicon glyphicon-home"></i></a>
									<a href="" class="btn btn-default">Database Company</a>
									<a href="" class="btn btn-default">Detail Company</a>
									<a href="#" class="btn btn-default">Add Address</a>
								</div>
							</div>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Settings 1</a></li>
										<li><a href="#">Settings 2</a></li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						{{ csrf_field() }}
						{{ method_field('post') }}
							{!! Form::open(['method' => 'POST','route' => ['save_pesawat'], 'class' => 'form-horizontal'])  !!}
								@include('admin.pesawat.form')
							{!! Form::close() !!}		
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


