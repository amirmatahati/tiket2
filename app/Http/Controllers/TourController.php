<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mtour;
use App\Models\MCategoryGalleries;

use Indonesia;
use App\Classes\StringClass;
use Auth;
use DB;
use Carbon;
class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data			= Mtour::paginate(10);
		$city			= Indonesia::allProvinces();
		$catid			= 0;
		$category			= MCategoryGalleries::all();
		$category_gallery				= 0;
		
        return view('admin.travel.index',compact('data','city','catid','category','category_gallery'));
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
		$strings                        = new StringClass();
        $travel_title	                = $strings->str2alias($request->travel_title);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('travel_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $travel_title . '.' .$bs;
        $b_image                        = 'image/gallery/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/gallery/'.$nombreCarpeta;
		
		
        $travel							= new Mtour;
		
		$travel->travel_title			= $request->travel_title;
		$travel->travel_text			= $request->travel_text;
		$travel->travel_image			= $b_image;
		$travel->user_id				= Auth::user()->id;
		$travel->category_post			= $request->category_gallery;

		$travel->save();
		
		$imageName                      = $strings->str2alias($travel->travel_title);
        $nmImg                          = strtolower($imageName) . '.' .
        
        $request->file('travel_image')->getClientOriginalExtension();
        $request->file('travel_image')->move($path, $nmImg);
		
		
		return response()->json($travel);
		
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
        $data							= Mtour::find($id);
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
        $travel_title	        = $strings->str2alias($request->travel_title);
        
        $travel_title             = strtolower($travel_title);
       
        if($request->hasFile('travel_image')) {
        $strings                        = new StringClass();
        $travel_title	                = $strings->str2alias($request->travel_title);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('travel_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $travel_title . '.' .$bs;
        $b_image                        = 'image/gallery/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/gallery/'.$nombreCarpeta;
        }else{
            $b_image                	= $request->b_image;
        }
		
		$travel							= Mtour::find($id);
		
		$travel->travel_title			= $request->travel_title;
		$travel->travel_text			= $request->travel_text;
		$travel->travel_image			= $b_image;
		$travel->user_id				= Auth::user()->id;
		
		if($request->hasFile('travel_image')) {
            $imageName = $strings->str2alias($travel->travel_title);
            $nmImg      = strtolower($imageName) . '.' . 
            $request->file('travel_image')->getClientOriginalExtension();
            $request->file('travel_image')->move($path, $nmImg);
        }
        $travel->save();
		
		return response()->json($travel);
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
