<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Mmaskapai;
use Indonesia;

class MaskapaiController extends Controller
{
    public function searchFlight(Request $request)
	{
		$form_ts			= $request->get('form_t');
		$to					= $request->to;
		$seat_stock			= $request->seat_stock;
		$date_on			= $request->date_on;
		
		$query11			= Mmaskapai::where('go_away', 'LIKE', '%' . $form_ts . '%')->get();
		if($query11->count() > 0){
			$query1				= $query11->first()->go_away;
		}else{
			$query1			= 0;
		}
		$query2				= Mmaskapai::where('tujuan', 'LIKE', '%' . $to . '%')->first()->tujuan;
		//$query3				= Mmaskapai::where('date_go', 'LIKE', '%' . $date_on . '%')->first()->date_go;
		//return response()->json($query);
		if($query1 > 0){
			$query			= Mmaskapai::where('go_away', 'LIKE', '%' . $query1 . '%')
							->orWhere('tujuan', 'LIKE', '%' . $query2 . '%')
							->orWhere('date_go', 'LIKE', '%' . $date_on . '%')
							->paginate(10);
		}else{
			$query			= 0;
		}
		return view('homes.table_search_flight', compact('query'));
	}
}
