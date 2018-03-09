<script src="{{ asset('assets/bower_components/gentelella/vendors/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
 <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('web/js/SmoothScroll.min.js') }}"></script>
<script src="{{ asset('web/js/move-top.js') }}"></script>
<script src="{{ asset('web/js/easing.js') }}"></script>
<script src="{{ asset('web/js/jquery-ui.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
	$(document).ready(function() {
	$( "#datepicker,#datepicker1" ).datepicker();
});
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<script src="{{ asset('web/js/responsiveslides.min.js') }}"></script>
			<script>
									// You can also use "$(window).load(function() {"
									$(function () {
									 // Slideshow 4
									$("#slider3").responsiveSlides({
										auto: true,
										pager: false,
										nav: true,
										speed: 500,
										namespace: "callbacks",
										before: function () {
									$('.events').append("<li>before event fired.</li>");
									},
									after: function () {
										$('.events').append("<li>after event fired.</li>");
										}
										});
										});
			</script>
<script src="{{ asset('web/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('web/js/jquery.countup.js') }}"></script>
		<script>
			$('.counter').countUp();
		</script>
<script src="{{ asset('web/js/jquery.flexslider.js') }}"></script>
	<script type="text/javascript">
		
				$(window).load(function(){
				$('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
						$('body').removeClass('loading');
					}
			});
		});
	</script>
<script src="{{ asset('web/js/easyResponsiveTabs.js') }}"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
				
</script>

