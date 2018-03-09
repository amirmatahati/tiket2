<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\MForm;
use App\Models\Mmaskapai;
use Indonesia;
use MetaTag;

use Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		MetaTag::set('title', 'Booking - AmirMataHati');
        MetaTag::set('description', 'Booking tiket pesawat murah garuda indonesia,air asia');
		$city				= Indonesia::allProvinces();
		$catid				= 0;
		$seat_stock			= 0;
        return view('homes.booking', compact('city','catid','seat_stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$tgl					= $request->date_on;
		
		$dates					= date('YYYY-mm-dd', strtotime($tgl));
        $flight					= new MForm;
		$flight->name			= $request->name;
		$flight->email			= $request->email;
		$flight->form			= $request->form;
		$flight->to				= $request->to;
		$flight->adults			= $request->adults;
		$flight->children		= $request->children;
		$flight->travel_class	= $request->travel_class;
		$flight->date_on		= $request->dates;
		$flight->journey_type	= $request->journey_type;
		$flight->save();
		
		return response()->json($flight);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
