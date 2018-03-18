@extends('layouts.app')
@section('content')
<style>
.agile_gallery_grid1 {
    position: relative;
    height: 264px !important;
    overflow: hidden;
}
#LoadDongs {
		position: fixed;
		top:0px;
		width: 100%;
		z-index: 1;
	}

	#LoadingContent {
		height: 30px;
		margin: auto;
		width: 180px;
		background: #ff005e;
		text-align: center;
		line-height: 29px;
		font-weight: bold;
		color: #fff;
	}	
</style>
<div id="LoadDongs"></div>
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
    var id = $(elem).attr("id");
    $.ajax({
                url:"{{ url('/galleries') }}",
                type:'GET',
                data:'keyword='+id,
                beforeSend:function () {
					$("#LoadDongs").html("<div id='LoadingContent'><i class='fa fa-spinner fa-spin'></i> Mohon tunggu ....</div>");
					$("#LoadDongs").show();
                },
                success:function (data) {
                   $(".show_detail").fadeIn("slow");
                   $(".show_detail").html(data);
				   $(".show_detail").replaceAll($(".show_detail"));
                   $('#LoadDongs').fadeOut("slow");
                }
            });
}
</script>
<script type="text/javascript">
 $(function() {
            $('.show_detail').on('click', '.pagination a', function(e) {
                e.preventDefault();

            $("#LoadDongs").html("<div id='LoadingContent'><i class='fa fa-spinner fa-spin'></i> Mohon tunggu ....</div>");
			$("#LoadDongs").show();
                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.show_detail').html(data);
					$('#LoadDongs').fadeOut("slow");
                }).fail(function () {
                    alert('Scoring could not be loaded.');
                });
            }
        });
</script>
<script>
var habiscuy;
		$(document).on({
			ajaxStart: function() { 
				habiscuy = setTimeout(function(){
					$("#LoadDongs").html("<div id='LoadingContent'><i class='fa fa-spinner fa-spin'></i> Mohon tunggu ....</div>");
					$("#LoadDongs").show();
				}, 500);
			},
			ajaxStop: function() { 
				clearTimeout(habiscuy);
				$("#LoadDongs").hide(); 
			}
		});
</script>
@endsection