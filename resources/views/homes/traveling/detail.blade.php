@extends('layouts.app')
@section('content')
<style>
body{
	text-align: justify;
}
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
.block {
    text-align: center;
    padding: 7px;
    border: 1px solid #ddd;
        border-top-width: 1px;
        border-top-style: solid;
        border-top-color: rgb(221, 221, 221);
    border-top: 3px solid #eb4800;
    -moz-box-shadow: 0 0 3px 0 #ccc;
    -webkit-box-shadow: 0 0 3px 0 #ccc;
    box-shadow: 0 0 3px 0 #ccc;
    margin-bottom: 20px;
}
h4.title .pull-right {
    background-color: #fff;
    padding-left: 10px;
}
h4.title .left, h4.title .right {
    display: inline-block;
    width: 22px;
    height: 22px;
    cursor: pointer;
}
h4.title .left {
    background: url(../image/arrow-pleft.png) #eee no-repeat center center;
    margin-right: 2px;
}
h4.title .right {
    background: url(../image/arrow-p.png) #eee no-repeat center center;
}
.product-box img {
    overflow: hidden;
    height: 211px;
    width: 100%;
}
.owl-prev {
    background: url(../image/arrow-pleft.png) #eee no-repeat center center !important;
	float: right;
	margin-top: -222px;
    margin-right: 19px;
	background-color: #fff;
    padding-left: 10px;
	width: 25px;
}
.owl-next {
    background: url(../image/arrow-p.png) #eee no-repeat center center !important;
	float: right;
	margin-top: -222px;
    margin-right: 0;
	background-color: #fff;
    padding-left: 10px;
	width: 25px;
}
.owl-carousel .owl-item{
	height: 194px !important;
	overflow: hidden !important;
}


</style>
<div id="LoadDongs"></div>
<div class="banner-bottom gallery">
	<div class="container">
		<div class="col-md-12">
		<h1>{{ $postview->travel_title}}</h1>
		<br />
		<img src="{{ asset($postview->travel_image)}}" class="img-responsive center-block">
		<br />
		<p style="text-align:justify !important;">
			{!! $postview->travel_text !!}
		</p>
		<div class="clearfix"></div>
		<br />
		<br />
				<div class="owl-carousel loop-test">
					@foreach($random_item as $b)
						<div data-animate="flipInX animated"> <img alt="" src="{{ asset($b->image_gallery)}}"></div>
					@endforeach
				</div>
		</div>
		
</div>
@include('includes/footer')
<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
$(document).ready(function() {
	$('.loop-test').owlCarousel({
		center: true,
		items: 4,
		loop: true,
		margin: 10,
		nav: true,
		margin:10,
		autoplay:true,
		autoplayTimeout:2000,
		onTranslated: animateSlide,
		onTranslate: removeAnimation,
		responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
	});

	$('.loop-test1').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		margin:10,
		autoplay:true,
		autoplayTimeout:2000,
		onTranslated: animateSlide,
		onTranslate: removeAnimation
	});

	$('.loop-test2').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		margin:10,
		autoplay:true,
		autoplayTimeout:2000,
		onTranslated: animateSlide,
		onTranslate: removeAnimation
	});

	$('.loop-test3').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		margin: 10,
		nav: true,
		margin:10,
		autoplay:true,
		autoplayTimeout:2000,
		onTranslated: animateSlide,
		onTranslate: removeAnimation
	});


// Other Slides
function removeAnimation() {
   var item = $(".owl-item");
  item.removeClass(item.children().data('animate'));

}

function animateSlide() {
  
  var item = $(".owl-item.active");
  item.addClass(item.children().data('animate'));
  
  
}

     
    });

</script>
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
					$("#LoadDongs").html("<div id='LoadingContent'><i class='fa fa-spinner fa-spin'></i> Mohon tunggu ....</div>");
					$("#LoadDongs").show();
                },
                success:function (data) {
					hostsDone++;
        updateProgress((hostsDone/hosts)*100);
                   $(".show_detail").fadeIn("slow");
                   $(".show_detail").html(data);
				   $(".show_detail").replaceAll($(".show_detail"));
                   $('#LoadDongs').fadeOut("slow");
                }
            });
}
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
$(function(){
    $('.carousel').carousel({
      interval: 2000
    });
});
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