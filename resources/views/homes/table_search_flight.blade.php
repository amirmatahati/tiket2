
<div class="well">
{{ ucwords($kemana)}} / {{ ucwords($tiba)}}<br />
	{{ Carbon\Carbon::parse($date_on)->format('D M Y') }} | {{ $seat_stock }} Dewasa
</div>
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
    	@foreach($query as $key => $b)
			<tr>
				<td>{{ $query->firstItem() + $key }}</td>
    			<td><img src="{{ asset($b->Pesawat->image)}}" width="82%" class="img-responsive">{{ $b->Pesawat->name }}</td>
				<td>{{ $b->time_go }}<br />{{ ucwords($b->Provincies->name) }}</td>
				<td>{{ $b->transit }}<br />{{ ucwords($b->Provincies2->name) }}</td>
				<td>{{ $b->durasi }} <br /> Langsung</td>
				<td><h5 style="color: #ea5b1d;">Rp. {{ number_format($b->price, 2) }}</h5></td>
				<td>
					{{ csrf_field() }}
					{{ method_field('post') }}
					{!! Form::open(['method' => 'POST','route' => ['detailflight'], 'class' => 'form-horizontal'])  !!}
						<input type="hidden" name="id" value="{{ $b->id }}">
						<input type="hidden" name="seat_stock" value="{{ $seat_stock }}">
						<button type="submit" class="btn btn-info">Booking</button>
					{!! Form::close() !!}
				</td>
    		</tr>
    	@endforeach
    	</tbody>
    </table>
 </div>
	@if($query->count() === 0)
		<div class="alert alert-danger">
		No data found.
	</div>
	@endif
{!! $query->render() !!}

