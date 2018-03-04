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
<div class="form-group{{ $errors->has('kelas') ? ' has-error' : '' }}">
	<label for="kelas" class="col-md-2 control-label">Kelas</label>
	<div class="col-md-8">
		{!! Form::text('kelas', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Address','class' => 'form-control')) !!}
			@if ($errors->has('kelas'))
			<span class="help-block">
				<strong>{{ $errors->first('kelas') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
	<label for="price" class="col-md-2 control-label">Harga</label>
	<div class="col-md-8">
		{!! Form::text('price', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Harga','class' => 'form-control')) !!}
			@if ($errors->has('price'))
			<span class="help-block">
				<strong>{{ $errors->first('price') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('date_go') ? ' has-error' : '' }}">
	<label for="date_go" class="col-md-2 control-label">Waktu</label>
	<div class="col-md-8">
		{!! Form::text('date_go', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Waktu','class' => 'form-control','id' => 'datepicker')) !!}
			@if ($errors->has('date_go'))
			<span class="help-block">
				<strong>{{ $errors->first('date_go') }}</strong>
			</span>
			@endif
	</div>
</div>
