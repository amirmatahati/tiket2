<?php

namespace App\Http\Controllers\homes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Spatie\Sitemap\SitemapGenerator;

use App\Models\MGalleries;
use App\Models\MCategoryGalleries;
use App\Models\Mtour;

use MetaTag;

class GalleriesController extends Controller
{
    public function index(Request $request)
	{
		MetaTag::set('title', 'Galleries - AmirMataHati');
		MetaTag::set('keywords', 'citumang,pantai anyer, pantai sawarna,pantai bayah,body rafting,curug ciherang,cidahu');
        MetaTag::set('description', 'Alam tak hanya menyajikan keindahan saja guys, tapi juga mengajarkan kita tentang arti kebersamaan.!');
		
		$cat				= MCategoryGalleries::all();
		if($request->ajax()){
			$category_gallery	= $request->keyword;
			$gallery			= MGalleries::where('category_gallery',$category_gallery )->paginate(10);
			return response()->json(\View::make('homes.detail_gallery', array('gallery' => $gallery,'cats' => $category_gallery))->render());
		}
		return view('homes.galleries', compact('cat'));
	}
	public function sitemaps()
	{
		
		
		return view('sitemaps');
	}
	public function view($alias)
	{
		$catid		= MCategoryGalleries::where('category_alias', $alias)->first()->id;
		$postview   = Mtour::where('category_post', $catid)->firstOrFail();
		
		$images		= $postview->travel_image;
		$random_item	= MGalleries::where('category_gallery', $catid)->get();
		
		$name_random	= MCategoryGalleries::where('id', $catid)->first()->category_name;
		
		MetaTag::set('title', 'Galleries - AmirMataHati');
		MetaTag::set('keywords', 'citumang,pantai anyer, pantai sawarna,pantai bayah,body rafting,curug ciherang,cidahu');
        MetaTag::set('description', 'Alam tak hanya menyajikan keindahan saja guys, tapi juga mengajarkan kita tentang arti kebersamaan.!');
		MetaTag::set('image', asset($images));
		
		return view('homes.traveling.detail', compact('postview','random_item'));
	}
}

