@extends('admin.layouts.app')
@section('content')

<style>
.y_video{
    float: left;
    display: inline-table;
    width: 236px;
    margin-left: 0;
    margin-right: 19px;
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
						<a href="#" class="btn btn-primary btn-sm add-modal"><span class="glyphicon glyphicon-plus"></span> Add</a>
						<br />
						<div id="tabs">
							@foreach($data as $key => $b)
								<ul class="thumbnail y_video item{{ $b->id }}">
									<a class="various fancybox fancybox.iframe" data-fancybox-type="iframe" href="{{ $b->travel_image }}" rel="gallery" title="{{ $b->travel_title }}">
										<img src="{{ $b->travel_image }}"  align="center" alt="" class="videoy">
									</a>
									<div class="caption">{{ $b->travel_title }}</div>
									<a href="javascript:void(0)" onclick="edit_data({{$b->id}})" class="btn-sm btn-danger pull-right" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
									<a href="" class="btn-sm btn-info pull-right" data-toggle="tooltip" data-placement="top" data-trigger="hover" title="Delete Article" onclick="return confirm('Apakah Anda yakin menghapus video ini?')" style="margin-right: 4px;">Delete <i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</ul>
							@endforeach
							
							@if($data->count() === 0)
								<div class="alert alert-danger">
									No data found.
								</div>
							@endif
						{!! $data->render() !!}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>

<script type="text/javascript">
$(document).ready(function() {
	$(".fancybox").fancybox();
	$(document).on('click', '.add-modal', function() {
        $('.modal-title').text('Add');
		$('#videos')[0].reset(); 
        $('#addModal').modal('show');
    });
	$(document).on('click', '.edit_data', function() {
		CKEDITOR.replace('#technig')
        $('.modal-title').text('Add');
        $('#editModal').modal('show');
    });
	$(document).on('click', '.delete_data', function() {
        $('.modal-title').text('Delete');
        $('#deleteModal').modal('show');
    });
});
$(document).ready(function() {
    //this calculates values automatically 
	$('#datepicker').datetimepicker({
			format: 'YYYY-MM-DD HH:mm:ss'
			});
});
</script>

@include('admin.travel.jquery.add')
@include('admin.travel.jquery.edit')
@include('admin.travel.jquery.delete')
@endsection

