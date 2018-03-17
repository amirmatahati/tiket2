<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('home');
});
*/

Auth::routes();
Route::get('/', 'homes\HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminHomeController@index')->name('admin');

Route::get('add-pesawat', 'PesawatController@create')->name('add_pesawat');
Route::get('list-pesawat', 'PesawatController@index')->name('list_pesawat');
Route::get('edit-pesawat/{id}', 'PesawatController@edit')->name('edit_pesawat');
Route::post('update-pesawat/{id}', 'PesawatController@update')->name('update_pesawat');
Route::post('save-pesawat', 'PesawatController@store')->name('save_pesawat');
Route::get('delete-pesawat/{id}', 'PesawatController@destroy')->name('delete_pesawat');

Route::get('list-route', 'RouteController@index')->name('routelist');
Route::post('save-route','RouteController@store')->name('routesave');

Route::get('travel-list', 'TourController@index')->name('travellist');
Route::post('travel-insert', 'TourController@store')->name('inserttravel');
Route::get('travel-edit/{id}', 'TourController@edit')->name('edittravel');
Route::post('travel-update/{id}', 'TourController@update')->name('updatetravel');

/* maskapai */
Route::get('maskapai-list', 'MaskapaiController@index')->name('maskapailist');
Route::post('save-maskapai','MaskapaiController@store')->name('insertmaskapai');

Route::get('gallery-list', 'GallerisController@index')->name('listgalleries');
Route::post('gallery-save', 'GallerisController@store')->name('savegallery');
Route::get('gallery-edit/{id}', 'GallerisController@edit')->name('editgalleries');
Route::get('get-category-galleries/{id}', 'GallerisController@combo_data')->name('catgalleries');
Route::post('gallery-update/{id}', 'GallerisController@update')->name('updategallery');

/*halaman depan */
Route::get('get-banner/{id}','homes\HomeController@GetAjaxBanner')->name('getbanner');
Route::post('submit-booking-fight','homes\BookingController@store')->name('submitfight');

Route::get('/booking', 'homes\BookingController@index')->name('home');
Route::post('booking-search', 'homes\MaskapaiController@searchFlight')->name('search_flight');

Route::post('get-detail-flight','homes\MaskapaiController@DetailFlight')->name('detailflight');
Route::get('galleries','homes\GalleriesController@index')->name('gallerieshome');

Route::get('travelling-yuk/{alias}.html','homes\GalleriesController@view')->name('travelingyuk');

Route::get('travelling-yuk/{alias}.html','homes\GalleriesController@view')->name('travelingyuk');
Route::get('sitemap', function(){

    /* create new sitemap object */

    $sitemap = App::make("sitemap");

    

    /* add item to the sitemap (url, date, priority, freq) */

    $sitemap->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('/booking'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');

    
 

    $posts = DB::table('gallery_travell')->orderBy('created_at','desc')
                    ->groupBy('id')
                    ->get();

    

    $postResult = array();

    if(!empty($posts)){

        foreach ($posts as $key => $value) {

            $postResult[$value->id]['id'] = $value->id;

            $postResult[$value->id]['gallery_name'] = $value->gallery_name;
            $postResult[$value->id]['category_gallery'] = $value->category_gallery;
            $postResult[$value->id]['updated_at'] = $value->updated_at;
            $postResult[$value->id]['image_gallery'][] = $value->image_gallery;

        }

    }

    

     /* add every post to the sitemap */

     foreach ($postResult as $key=>$value)

     {

        $images = array();

        foreach ($value['image_gallery'] as $key2 => $value2) {

            $images[] = array(

                'url' => URL::to('/').$value2,
                'title' => $value['gallery_name']

            );    

        }

        $sitemap->add(url('galleries?keyword='.$value['category_gallery'].''), $value['updated_at'], '1.0', 'daily', $images);

    }

    
    $travel = DB::table('tour_post')
					->join('category_galleries','tour_post.category_post','category_galleries.id')
					->orderBy('tour_post.created_at','desc')
                    ->groupBy('tour_post.id')
                    ->get();

    

    $travelResult = array();

    if(!empty($travel)){

        foreach ($travel as $key => $value) {

            $travelResult[$value->id]['id'] = $value->id;

            $travelResult[$value->id]['travel_title'] = $value->travel_title;
            $travelResult[$value->id]['category_alias'] = $value->category_alias;
            $travelResult[$value->id]['updated_at'] = $value->updated_at;
            $travelResult[$value->id]['travel_image'][] = $value->travel_image;

        }

    }

    

     /* add every post to the sitemap */

     foreach ($travelResult as $key=>$value)

     {

        $images = array();

        foreach ($value['travel_image'] as $key2 => $value2) {

            $images[] = array(

                'url' => URL::to('/').$value2,

                'title' => $value['travel_title']

            );    

        }

        $sitemap->add(url('travelling-yuk/'.$value['category_alias'].'.html'), $value['updated_at'], '1.0', 'daily', $images);

    }

    

    /* show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf') */

    return $sitemap->render('xml');

});
