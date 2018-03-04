<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpesawat;
//use App\Models\Indonesia;
use Indonesia;

class PesawatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data			= Mpesawat::paginate(10);
        return view('admin.pesawat.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$city		= Indonesia::allProvinces();
		$catid		= 0;
		
		//echo json_encode($city);
        return view('admin.pesawat.add',compact('city','catid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query				= new Mpesawat;
		$query->name		= $request->name;
		$query->seat_number	= $request->seat;
		$query->status		= 1;
		
		$query->save();
		return response()->json($query);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data				= Mpesawat::find($id);
		return response()->json($data);
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
        $data				= Mpesawat::find($id);
		$data->name			= $request->name;
		$data->seat_number	= $request->seat;
		$data->status		= 1;
		
		$data->save();
		
		return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data				= Mpesawat::FindOrFail($id);
		$data->delete();
		
		return response()->json($data);
    }
}
