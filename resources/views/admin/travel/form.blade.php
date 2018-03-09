<div class="form-group">
	<label for="city" class="col-md-2 control-label">Category Video</label>
	<div class="col-md-8">
		<select id="category" class="form-control m-bot15" name="city">
			@if($city->count())
				@foreach($city as $role)
					<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
				@endforeach
			@endif	
		</select>
	</div>
</div>
<div class="form-group{{ $errors->has('travel_title') ? ' has-error' : '' }}">
	<label for="travel_title" class="col-md-2 control-label">Title</label>
	<div class="col-md-8">
		{!! Form::text('travel_title', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Title','class' => 'form-control')) !!}
			@if ($errors->has('travel_title'))
			<span class="help-block">
				<strong>{{ $errors->first('travel_title') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('travel_image') ? ' has-error' : '' }}">
	<label for="travel_image" class="col-md-2 control-label">Image</label>
	<div class="col-md-8">
	{!! Form::file('travel_image', null) !!}
		@if ($errors->has('travel_image'))
			<span class="help-block">
				<strong>{{ $errors->first('travel_image') }}</strong>
			</span>
		@endif
	</div>
</div>
<div class="form-group{{ $errors->has('travel_text') ? ' has-error' : '' }}">
	<label for="travel_text" class="col-md-2 control-label">Text</label>
	<div class="col-md-8">
		{{ Form::textarea('travel_text', null, ['class' => 'field technig','id' => 'technig']) }}
			@if ($errors->has('travel_text'))
			<span class="help-block">
				<strong>{{ $errors->first('travel_text') }}</strong>
			</span>
			@endif
	</div>
</div>

