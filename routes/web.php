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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\SongCategory;

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/artist', 'ArtistController@index')->middleware('artist')->name('artist.index');

Route::get('/artist/song/{album_id}', 'SongController@create')->middleware('artist')->name('song.create');
Route::post('/artist/song', 'SongController@store')->middleware('artist')->name('song.store');

// Route::get('/artist/test', function() {
//     $categories = SongCategory::select('id', 'name')->get();

//     return view('includes/create-edit-song', compact('categories'));
// });

Route::get('/artist/dashboard', 'ArtistController@dashboard')->name('artist.dashboard');

// Album
// middleware added in controller
Route::get('/artist/album', 'AlbumController@create')->name('album.create');
Route::post('/artist/album', 'AlbumController@store')->name('album.store');
Route::get('/artist/album/{album_id}/edit', 'AlbumController@edit')->name('album.edit');
Route::any('/artist/album/{album_id}', 'AlbumController@update')->name('album.update');
Route::delete('/artist/album/{album_id}', 'AlbumController@destroy')->name('album.delete');


Route::patch('/test', function () {

    
    return response()->json([
        'result' => "hello thwew",
        'request' => request()->album_image
    ]);
    // auth()->user()->album()->create([
    //     'name' => 'name',
    //     'img_url' => "imagePath"
    // ]);
    $album = [];
    $var = view('includes.album', compact('album'));
    return $var;
});


