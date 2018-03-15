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
