<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mpesawat;
//use App\Models\Indonesia;
use Indonesia;
use App\Classes\StringClass;

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
		$strings                = new StringClass();
        $gallery_title          = $strings->str2alias($request->name);
        
        $b_title            	= strtolower($gallery_title);
		
		$strings                        = new StringClass();
        $gallery_title                  = $strings->str2alias($request->name);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('b_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $gallery_title . '.' .$bs;
        $b_image                        = 'image/pesawat/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/pesawat/'.$nombreCarpeta;
		
		
        $query				= new Mpesawat;
		$query->name		= $request->name;
		$query->seat_number	= $request->seat;
		$query->status		= 1;
		$query->image		= $b_image;
		
		$query->save();
		
		
		$imageName = $strings->str2alias($query->name);
        $nmImg      = strtolower($imageName) . '.' . 
        $request->file('b_image')->getClientOriginalExtension();
        $request->file('b_image')->move($path, $nmImg);
		
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
		$strings                = new StringClass();
        $gallery_title          = $strings->str2alias($request->name);
        
        $b_title            	= strtolower($gallery_title);
       
        if($request->hasFile('b_image')) {
		$strings                        = new StringClass();
        $gallery_title                  = $strings->str2alias($request->name);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('b_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $gallery_title . '.' .$bs;
        $b_image                        = 'image/pesawat/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/pesawat/'.$nombreCarpeta;
		}else{
            $b_image                	= $request->gallery_file;
        }
		
        $data				= Mpesawat::find($id);
		$data->name			= $request->name;
		$data->seat_number	= $request->seat;
		$data->status		= 1;
		$data->image		= $b_image;
		
		if($request->hasFile('b_image')) {
            $imageName = $strings->str2alias($data->name);
            $nmImg      = strtolower($imageName) . '.' . 
            $request->file('b_image')->getClientOriginalExtension();
            $request->file('b_image')->move($path, $nmImg);
        }
		
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
