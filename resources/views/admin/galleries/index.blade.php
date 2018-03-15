@extends('admin.layouts.app')
@section('content')
<style>
.thumb_gal{
	float: left;
	display: inline-table;
	width: 300px;
	padding: 10px;
	height: 300px;
	overflow: hidden;
}
.thumb_gal img{
	width: 260px;
	height: 157px;
}
.thumb_gal .thumbnail {
    height: 226px !important;
    overflow: hidden;
}
</style>
	<div class="right_col" role="main">
		<div class="page-title">
			<div class="title_left">
				<h3>List Gallery</h3>
            </div>
			<div class="title_right">
				<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="{{ url('/query/') }}" method="GET" role="search">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Search for...">
							<span class="input-group-btn">
							  <button class="btn btn-default" type="submit">Go!</button>
							</span>
					  </div>
					</div>
				</form>
			</div>
        </div>
		
		<div class="clearfix"></div>
		
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>List Gallery </h2>
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
						<div class="clearfix"></div>
					</div>
					
					<div class="x_content">
						<div class="flash-message">
							@foreach (['danger', 'warning', 'success', 'info'] as $msg)
							  @if(Session::has('alert-' . $msg))

							  <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
							  @endif
							@endforeach
						  </div> 
						<a href="#" class="btn btn-info add-modal">Add</a>
						<div style="clear: both;"></div>
							<div id="tabs">
								@foreach($gallery as $cb)	
								<div class="thumb_gal item{{$cb->id}}">
									<a class="thumbnail fancybox" rel="ligthbox" href="{{ asset($cb->gallery_name )}}">
										<img class="img-responsive" alt="" src="{{ asset($cb->image_gallery)}}" />
										<div class="text-center">
											<label>{{ $cb->gallery_name }}</label>
										</div>
									</a>
									<a class="btn-sm btn-success" href="javascript:void(0)" onclick="edit_data({{$cb->id}})" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
									<button class="delete-modal btn btn-danger" data-id="{{$cb->id}}" data-title="{{$cb->gallery_caption}}" data-content="{{$cb->gallery_caption}}">
									<span class="glyphicon glyphicon-trash"></span> Delete</button>
								</div>
								@endforeach 
								
								@if($gallery->count() === 0)
									<div class="alert alert-danger">
										No data found.
									</div>
								@endif
							{!! $gallery->render() !!}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function(){
	
	$(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
	$(window).load(function(){
		$('#table').removeAttr('style');
	})
	
	/* modal add */
	$(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Add');
		$('#gallery')[0].reset(); 
        $('#add-modal').modal('show');
    });
	/* modal edit */
	$(document).on('click', '.edit_data', function() {
        $('.modal-title').text('Add');
        $('#editModal').modal('show');
    });

	
	
});	
</script>
@include('admin.galleries.jquery.add')
@include('admin.galleries.jquery.edit')
@endsection

