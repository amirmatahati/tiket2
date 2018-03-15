@extends('layouts.app')
@section('content')
<style>
.agile_gallery_grid1 {
    position: relative;
    height: 264px !important;
    overflow: hidden;
}
</style>

<div class="banner-bottom gallery">
		<div class="container">
			<div class="wthree_head_section">
				<h2 class="w3l_header">Our <span>Gallery</span></h2>
				<p>A travel agency is a private retailer or public service that provides travel and tourism related services to the public on behalf of suppliers such as activities.</p>
			</div>
			<div class="w3ls_gallery_grids">
				@foreach($cat as $category)
				<div class="col-md-3">
					<div class="alert alert-info">
					<h4 class="text-center solTitle"><a id="{{ $category->id }}" onclick="enableTxt(this)" href="javascript:void(0)">{{ $category->category_name }}</a></h4>
					</div>
				</div>
				@endforeach
				

				<div class="clearfix"></div>
				<div class="progress">
				  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60"
				  aria-valuemin="0" aria-valuemax="100" style="width:60%">
					60% Complete (warning)
				  </div>
				</div>
			
				<div class="clearfix"></div>
				<div class="show_detail">
					
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
@include('includes/footer')
<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
$('.load-bar').hide();
$('.progress').hide();
function updateProgress(percentage){
    if(percentage > 100) percentage = 100;
    $('.progress-bar').css('width', percentage+'%');
    $('.progress-bar').html(percentage+'%');
}
function enableTxt(elem) {
	var hosts = 10;
	var hostsDone = 0;
    var id = $(elem).attr("id");
for(host = 0; host <= hosts; host++){
	ipToCheck = host;
    $.ajax({
                url:"{{ url('/galleries') }}",
                type:'GET',
                data:'keyword='+id+'ip='+ipToCheck,
                beforeSend:function () {
					$('.progress').show();
					$('.progress-bar').show();
					hostsDone++;
        updateProgress((hostsDone/hosts)*50);
                },
                success:function (data) {
					hostsDone++;
        updateProgress((hostsDone/hosts)*100);
                   $(".show_detail").fadeIn("slow");
                   $(".show_detail").html(data);
				   $(".show_detail").replaceAll($(".show_detail"));
                   $('.progress').fadeOut("slow");
                   $('.progress-bar').fadeOut("slow");
                }
            });
}
}
</script>
<script type="text/javascript">

	</script>
@endsection