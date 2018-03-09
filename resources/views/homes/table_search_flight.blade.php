<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>No.</th>
    			<th>Maskapai</th>
    			<th>Berangkat</th>
    			<th>Tiba</th>
    			<th>Durasi</th>
    			<th>Harga</th>
				<th></th>
    		</tr>
    	</thead>
    	<tbody>
		@if($query === 0)
			No data found.
		@else
    	@foreach($query as $key => $b)
			<tr>
				<td>{{ $query->firstItem() + $key }}</td>
    			<td><img src="{{ asset($b->Pesawat->image)}}" width="82%" class="img-responsive">{{ $b->Pesawat->name }}</td>
				<td>{{ $b->time_go }}<br />{{ ucwords($b->Provincies->name) }}</td>
				<td>{{ $b->transit }}<br />{{ ucwords($b->Provincies2->name) }}</td>
				<td>{{ $b->durasi }} <br /> Langsung</td>
				<td><h5 style="color: #ea5b1d;">Rp. {{ number_format($b->price, 2) }}</h5></td>
				<td><button class="btn btn-sm btn-info" type="submit">Booking</button></td>
    		</tr>
    	@endforeach
		@endif
    	</tbody>
    </table>
 </div>
@if($query === 0)
	No data found.
@else
	@if($query->count() === 0)
		<div class="alert alert-danger">
		No data found.
	</div>
	@endif
{!! $query->render() !!}
@endif