<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Mmaskapai;
use App\Models\Indonesias;
use Indonesia;

class MaskapaiController extends Controller
{
    public function searchFlight(Request $request)
	{
		$form_ts			= $request->get('form_t');
		$to					= $request->to;
		$seat_stock			= $request->seat_stock;
		$date_on			= $request->date_on;
		$seat_stock			= $request->seat_stock;
		
		$query11			= Mmaskapai::where('go_away', 'LIKE', '%' . $form_ts . '%')->get();
		$query122				= Mmaskapai::where('tujuan', 'LIKE', '%' . $to . '%')->get();
		$query2				= Mmaskapai::where('date_go', 'LIKE', '%' . $date_on . '%')->get();
		
		$query1				= Mmaskapai::where('go_away', $form_ts)
							->where('tujuan', $to)->get();
		
		if($query1->count() > 0){
			$query			= Mmaskapai::where('go_away', $form_ts)
							->where('tujuan', $to)
							->paginate(10);

			$kemana 		= Indonesias::where('id', $form_ts)->first()->name;
			$tiba	 		= Indonesias::where('id', $to)->first()->name;
		}else{
			$query			= Mmaskapai::where('date_go', 'LIKE', '%' . $date_on . '%')
							->paginate(10);
//			$kem			= Mmaskapai::where('go_away', $form_ts)->first()->go_away;
//			$kem1			= Mmaskapai::where('tujuan', $to)->first()->tujuan;

			$kemana 		= Indonesias::where('id', $form_ts)->first()->name;
			$tiba	 		= Indonesias::where('id', $to)->first()->name;
		}
		
		return view('homes.table_search_flight', compact('query','kemana','tiba','date_on','seat_stock'));
	}
}
