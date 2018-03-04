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
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
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