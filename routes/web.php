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
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/artist', 'ArtistController@index')->middleware('artist')->name('artist.index');

Route::get('/artist/song', 'SongController@create')->middleware('artist')->name('song.create');
Route::post('/artist/song', 'SongController@store')->middleware('artist')->name('song.store');

Route::get('/artist/dashboard', function () {
    return view('artist.dashboard');
})->middleware('artist')->name('song.dashboard');


Route::get('/test', function () {
    return view('tests');
});


