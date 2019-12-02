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

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/images', 'ImageController@getImages')->name('images');
    Route::get('/upload-image', 'ImageController@uploadPhotoView')->name('upload-image');
    Route::post('/upload-image', 'ImageController@postUpload')->name('uploadfile');

    Route::prefix('gear')->group(function () {
        Route::get('/browse', 'GearController@index')->name('gear.index');
        Route::get('/create', 'GearController@create')->name('gear.create');
        Route::get('/show', 'GearController@show')->name('gear.show');
        Route::get('/edit', 'GearController@edit')->name('gear.edit');
        Route::get('/delete', 'GearController@destroy')->name('gear.edit');
        Route::post('/store', 'GearController@store')->name('gear.store');
    });
});
