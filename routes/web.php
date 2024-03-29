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

use GrahamCampbell\GitHub\Facades\GitHub;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/github', function () {
   dd( GitHub::repo()->contents()->show('hailot','dndTomeDataExports'));
});


Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/images', 'ImageController@getImages')->name('images');
    Route::get('/upload-image', 'ImageController@uploadPhotoView')->name('upload-image');
    Route::post('/upload-image', 'ImageController@postUpload')->name('uploadfile');
    Route::get('/user-files', 'UserJsonFileController@getUserFiles')->name('user-files');
    Route::get('/profile', 'HomeController@profile')->name('user-profile');


    Route::prefix('gear')->group(function () {
        Route::get('/browse', 'GearController@index')->name('gear.index');
        Route::get('/api-data', 'GearController@apiData')->name('gear.apidata');
        Route::get('/create', 'GearController@create')->name('gear.create');
        Route::get('/show', 'GearController@show')->name('gear.show');
        Route::get('/edit', 'GearController@edit')->name('gear.edit');
        Route::get('/delete', 'GearController@destroy')->name('gear.edit');
        Route::post('/store', 'GearController@store')->name('gear.store');
    });

    Route::prefix('spells')->group(function () {
        Route::get('/browse', 'SpellController@index')->name('spell.index');
        Route::get('/api-data', 'SpellController@apiData')->name('spell.apidata');
        Route::get('/create', 'SpellController@create')->name('spell.create');
        Route::get('/show', 'SpellController@show')->name('spell.show');
        Route::get('/edit', 'SpellController@edit')->name('spell.edit');
        Route::get('/delete', 'SpellController@destroy')->name('spell.edit');
        Route::post('/store', 'SpellController@store')->name('spell.store');
    });

    Route::prefix('creatures')->group(function () {
        Route::get('/browse', 'CreatureController@index')->name('creature.index');
        Route::get('/api-data', 'CreatureController@apiData')->name('creature.apidata');
        Route::get('/create', 'CreatureController@create')->name('creature.create');
        Route::get('/show', 'CreatureController@show')->name('creature.show');
        Route::get('/edit', 'CreatureController@edit')->name('creature.edit');
        Route::get('/delete', 'CreatureController@destroy')->name('creature.edit');
        Route::post('/store', 'CreatureController@store')->name('creature.store');
    });

    Route::prefix('jsonfile')->group(function () {
        Route::get('/download/{file}','UserJsonFileController@download')->name('json.download');
        Route::post('/make-file','UserJsonFileController@makeJsonFile');
        Route::get('/api-data','UserJsonFileController@getApiData')->name('json.apidata');


    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
