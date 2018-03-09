	<div class="banner">
		<div class="banner-dott1">
			<div class="w3-banner">
			
				<div  class="callbacks_container">
				<ul class="rslides" id="slider3">
					@foreach($banner as $bann)
					<?php
						$txt = substr($bann->travel_text,0,150);
						$txts = stripslashes(strip_tags($txt));
					?>
					<li>
						<div class="banner-text">
							<h3>{{ $bann->travel_title }}</h3>
							<p>{{ $txts }}</p>
							<a href="javascript:void(0)" onclick="edit_data({{$bann->id}})" class="read-agileits" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> View Details</a>
						</div>
					</li>
					@endforeach
				</ul>
			</div>	
			
			</div>
					
		<!-- //w3-banner -->
		</div>
	</div>