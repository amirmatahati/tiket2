	@foreach($gallery as $b)
				<div class="col-md-4 w3_agile_gallery_grid">
					<div class="agile_gallery_grid">
						<a title="{{ $b->gallery_description }}" href="{{ asset($b->image_gallery) }}">
							<div class="agile_gallery_grid1">
								<img src="{{ asset($b->image_gallery) }}" alt=" " class="img-responsive" />
								<div class="w3layouts_gallery_grid1_pos">
									<h3>{{ $b->gallery_name }}</h3>
									<p> {{ str_limit($b->gallery_description, 60) }}</p>
								</div>
							</div>
						</a>
					</div>
				</div>
					@endforeach
@include('includes/footTags')