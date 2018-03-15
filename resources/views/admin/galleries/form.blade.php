<div class="form-group">
	<label for="city" class="col-md-2 control-label">Category Video</label>
	<div class="col-md-8">
		<select id="category" class="form-control m-bot15" name="category_gallery">
			@if($category->count())
				@foreach($category as $role)
					<option value="{{ $role->id }}" {{ $category_gallery == $role->id ? 'selected="selected"' : '' }}>{{ $role->category_name }}</option>    
				@endforeach
			@endif	
		</select>
	</div>
</div>
<div class="form-group{{ $errors->has('durasi') ? ' has-error' : '' }}">
	<label for="durasi" class="col-md-3 control-label">Gallery Name</label>
	<div class="col-md-9">
		{!! Form::text('gallery_name', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Gallery Name','class' => 'form-control')) !!}
			@if ($errors->has('durasi'))
			<span class="help-block">
				<strong>{{ $errors->first('durasi') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('gallery_description') ? ' has-error' : '' }}">
	<label for="gallery_description" class="col-md-2 control-label">Gallery Description</label>
	<div class="col-md-8">
		{!! Form::text('gallery_description', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Gallery Description','class' => 'form-control')) !!}
			@if ($errors->has('gallery_description'))
			<span class="help-block">
				<strong>{{ $errors->first('gallery_description') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('b_image') ? ' has-error' : '' }}">
		<label for="b_image" class="col-md-4 control-label">Image</label>
		<div class="col-md-8">
			<input type="file" name="b_image" id="uploadFile">
				@if ($errors->has('b_image'))
					<span class="help-block">
						<strong>{{ $errors->first('b_image') }}</strong>
					</span>
				@endif
	</div>
</div>