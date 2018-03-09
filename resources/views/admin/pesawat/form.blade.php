<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-1 control-label">Nama Pesawat</label>
	<div class="col-md-8">
		{!! Form::text('name', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Address','class' => 'form-control')) !!}
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	<label for="name" class="col-md-1 control-label">No Kursi</label>
	<div class="col-md-8">
		{!! Form::text('seat', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Address','class' => 'form-control')) !!}
			@if ($errors->has('name'))
			<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('b_image') ? ' has-error' : '' }}">
		<label for="b_image">Banner Image</label>
		<input type="file" name="b_image" id="uploadFile">
			@if ($errors->has('b_image'))
				<span class="help-block">
					<strong>{{ $errors->first('b_image') }}</strong>
				</span>
			@endif
	</div>