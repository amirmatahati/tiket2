<div class="form-group{{ $errors->has('time_go') ? ' has-error' : '' }}">
	<label for="time_go" class="col-md-2 control-label">Pergi</label>
	<div class="col-md-8">
		{!! Form::text('time_go', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Waktu','class' => 'form-control','id' => 'datepicker')) !!}
			@if ($errors->has('time_go'))
			<span class="help-block">
				<strong>{{ $errors->first('time_go') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('transit') ? ' has-error' : '' }}">
	<label for="transit" class="col-md-2 control-label">Tiba</label>
	<div class="col-md-8">
		{!! Form::text('transit', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Waktu','class' => 'form-control','id' => 'datepicker1')) !!}
			@if ($errors->has('transit'))
			<span class="help-block">
				<strong>{{ $errors->first('transit') }}</strong>
			</span>
			@endif
	</div>
</div>

<div class="form-group{{ $errors->has('durasi') ? ' has-error' : '' }}">
	<label for="durasi" class="col-md-2 control-label">Durasi</label>
	<div class="col-md-8">
		{!! Form::text('durasi', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Durasi','class' => 'form-control')) !!}
			@if ($errors->has('durasi'))
			<span class="help-block">
				<strong>{{ $errors->first('durasi') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group">
	<label for="city" class="col-md-2 control-label">Pesawat</label>
	<div class="col-md-8">
		<select id="category" class="form-control m-bot15" name="id_pesawat">
			@if($pesawat->count())
				@foreach($pesawat as $role)
					<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
				@endforeach
			@endif	
		</select>
	</div>
</div>
<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
	<label for="price" class="col-md-2 control-label">Price</label>
	<div class="col-md-8">
		{!! Form::text('price', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Price','class' => 'form-control')) !!}
			@if ($errors->has('price'))
			<span class="help-block">
				<strong>{{ $errors->first('price') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group">
	<label for="go_away" class="col-md-2 control-label">Dari Kota</label>
	<div class="col-md-8">
		<select id="go_away" class="form-control m-bot15" name="go_away">
			@if($city->count())
				@foreach($city as $role)
					<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
				@endforeach
			@endif	
		</select>
	</div>
</div>
<div class="form-group">
	<label for="tujuan" class="col-md-2 control-label">Tujuan Kota</label>
	<div class="col-md-8">
		<select id="tujuan" class="form-control m-bot15" name="tujuan">
			@if($city->count())
				@foreach($city as $role)
					<option value="{{ $role->id }}" {{ $catid == $role->id ? 'selected="selected"' : '' }}>{{ $role->name }}</option>    
				@endforeach
			@endif	
		</select>
	</div>
</div>
<div class="form-group{{ $errors->has('date_go') ? ' has-error' : '' }}">
	<label for="date_go" class="col-md-2 control-label">Tgl Pergi</label>
	<div class="col-md-8">
		{!! Form::text('date_go', null, array('required' => 'required', 'autofocus' => 'autofocus','placeholder' => 'Tgl Pergi','class' => 'form-control','id' => 'datepicker2')) !!}
			@if ($errors->has('date_go'))
			<span class="help-block">
				<strong>{{ $errors->first('date_go') }}</strong>
			</span>
			@endif
	</div>
</div>
<div class="form-group{{ $errors->has('seet_stock') ? ' has-error' : '' }}">
		<label for="seet_stock">Stok Kursi</label>
			{{ Form::selectRange('seet_stock',null, 10, $seet_stock,['class' => 'form-control']) }}
			@if ($errors->has('seet_stock'))
				<span class="help-block">
					<strong>{{ $errors->first('seet_stock') }}</strong>
				</span>
			@endif
	</div>
