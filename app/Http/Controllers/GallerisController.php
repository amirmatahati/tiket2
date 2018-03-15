<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MGalleries;
use App\Models\MCategoryGalleries;

use App\Classes\StringClass;

class GallerisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$gallery			= MGalleries::paginate(10);
		$category			= MCategoryGalleries::all();
		$category_gallery				= 0;
        return view('admin.galleries.index', compact('gallery','category_gallery','category'));
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
        $strings               			= new StringClass();
        $gallery_title          		= $strings->str2alias($request->gallery_name);
        
        $b_title            			= strtolower($gallery_title);
		
		$strings                        = new StringClass();
        $gallery_title                  = $strings->str2alias($request->gallery_name);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('b_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $gallery_title . '.' .$bs;
        $b_image                        = 'image/gallery/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/gallery/'.$nombreCarpeta;
		
		
        $query							= new MGalleries;
		$query->gallery_name			= $request->gallery_name;
		$query->gallery_description		= $request->gallery_description;
		$query->image_gallery			= $b_image;
		$query->category_gallery		= $request->category_gallery;
		
		$query->save();
		
		
		$imageName 						= $strings->str2alias($query->gallery_name);
        $nmImg      					= strtolower($imageName) . '.' . 
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
        $gallery			= MGalleries::find($id);
		
		return response()->json($gallery);
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
        $gallery_name	        = $strings->str2alias($request->gallery_name);
        
        $gallery_name             = strtolower($gallery_name);
       
        if($request->hasFile('b_image')) {
        $strings                        = new StringClass();
        $gallery_name	                = $strings->str2alias($request->gallery_name);

        $now                            = \Carbon\Carbon::now();
		$year                           = date('Y', strtotime($now));
		$month                          = date('m', strtotime($now));
        $days                           = date('d', strtotime($now));
        
        $bs                             = $request->file('b_image')->getClientOriginalExtension();
        $nombreCarpeta                  = preg_replace('/\s+/', '.', $year . "/" . $month . "/" . $days);
        $fileimg                        = $gallery_name . '.' .$bs;
        $b_image                        = 'image/gallery/'.$nombreCarpeta .'/' .$fileimg;
        $path                           = base_path() .'/public/image/gallery/'.$nombreCarpeta;
        }else{
            $b_image                	= $request->image_gallery;
        }
		
		$query							= MGalleries::find($id);
		
		$query->gallery_name			= $request->gallery_name;
		$query->gallery_description		= $request->gallery_description;
		$query->image_gallery			= $b_image;
		$query->category_gallery		= $request->category_gallery;
		
		if($request->hasFile('b_image')) {
            $imageName = $strings->str2alias($query->gallery_name);
            $nmImg      = strtolower($imageName) . '.' . 
            $request->file('b_image')->getClientOriginalExtension();
            $request->file('b_image')->move($path, $nmImg);
        }
        $query->save();
		
		return response()->json($query);
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
	public function combo_data($id)
	{
		
        $catid          	= MGalleries::where('id', $id)->first()->category_gallery;
        $catGalleries      	= MCategoryGalleries::all();
		 if($catGalleries->count()){
            foreach($catGalleries as $role){
				echo '<option value="'.$role->id.'" '.($catid == $role->id ?'selected="selected"':"").'>'.$role->category_name.'</option>';
            }
		}
	}
}
