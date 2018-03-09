<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mmaskapai;
use App\Models\Mpesawat;
use Indonesia;

class MaskapaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data			= Mmaskapai::paginate(10);
		$pesawat		= Mpesawat::all();
		$catid			= 0;
		$city			= Indonesia::allProvinces();
		$seet_stock		= 0;
        return view('admin.maskapai.index', compact('data','pesawat','catid','city','seet_stock'));
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
        $maskapai				= new Mmaskapai;
		$maskapai->time_go		= $request->time_go;
		$maskapai->transit		= $request->transit;
		$maskapai->durasi		= $request->durasi;
		$maskapai->id_pesawat	= $request->id_pesawat;
		$maskapai->price		= $request->price;
		$maskapai->id_fasilita	= 0;
		$maskapai->go_away		= $request->go_away;
		$maskapai->tujuan		= $request->tujuan;
		$maskapai->date_go		= $request->date_go;
		$maskapai->seat_stock	= $request->seet_stock;
		$maskapai->status		= 1;
		
		$maskapai->save();
		
		return response()->json($maskapai);
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
