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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/song', 'SongController@index')->middleware('auth')->name('song.index');
Route::get('/artist/song/{album_id}', 'SongController@create')->middleware('artist')->name('song.create');
Route::post('/artist/song', 'SongController@store')->middleware('artist')->name('song.store');
Route::delete('/song/{song_id}', 'SongController@destroy')->middleware('artist')->name('song.delete');
Route::get('/songJSON/{song_id}', 'SongController@showJSON')->middleware('auth')->name('songJSON.show');


// This is now work now beacuse i delete artist controller
Route::get('/artist/dashboard', function() {
    $artist = App\User::findOrFail(auth()->user()->id);

    $artistProfile = $artist->profile;

    $artistAlbums = $artist->album;

    return view('artist.dashboard', compact('artistProfile', 'artistAlbums'));
})->middleware('artist')->name('artist.dashboard');

// Album
// middleware added in controller(artist)
Route::get('/album', 'AlbumController@index')->name('album.index');
Route::get('/album/create', 'AlbumController@create')->name('album.create');
Route::post('/album', 'AlbumController@store')->name('album.store');
Route::get('/album/{album_id}', 'AlbumController@show')->name('album.show');
Route::get('/album/{album_id}/edit', 'AlbumController@edit')->name('album.edit');
Route::patch('/album/{album_id}', 'AlbumController@update')->name('album.update');
Route::delete('/album/{album_id}', 'AlbumController@destroy')->name('album.delete');
Route::get('/albumJSON/{album_id}', 'AlbumController@albumJSON')->middleware('auth')->name('albumJSON.show');

// Playlist
// middleware added in controller(auth)
Route::get('/playlist', 'PlaylistController@index')->name('playlist.index');
Route::get('/playlist/create', 'PlaylistController@create')->name('playlist.create');
Route::post('/playlist', 'PlaylistController@store')->name('playlist.store');
Route::get('/playlist/{playlist_id}', 'PlaylistController@show')->name('playlist.show');
Route::get('/playlist/{playlist_id}/edit', 'PlaylistController@edit')->name('playlist.edit');
Route::patch('/playlist/{playlist_id}', 'PlaylistController@update')->name('playlist.update');
Route::delete('/playlist/{playlist_id}', 'PlaylistController@destroy')->name('playlist.delete');
Route::get('/playlistJSON/{playlist_id}', 'PlaylistController@playlistJSON')->name('playlistJSON.show');
Route::get('/playlistListJSON', 'PlaylistController@playlistListJSON')->name('playlistJSON.index');
// Playlist sync with song
Route::get('/playlist/{playlist_id}/song/{song_id}/attach', 'PlaylistController@playlistAttach')->name('playlistSYNCsong.attach');
Route::get('/playlist/{playlist_id}/song/{song_id}/detach', 'PlaylistController@playlistDetach')->name('playlistSYNCsong.detach');


// Follow the user
// Middleware auth applied
Route::post('/follow/{user}', 'FollowsController@store')->name('follow-unfollow');

// Profile
Route::get('/profile/{user_id}', 'ProfileController@show')->name('profile.show');
Route::get('/profile/{user_id}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user_id}', 'ProfileController@update')->name('profile.update');

// Search
Route::get('/search', 'SearchController@getSeachPage');
Route::get('/search/result', 'SearchController@seachResult');

// Dadicate
Route::get('/dadicate/search', 'DedicateController@dedicateSearch')->middleware('auth');
Route::post('/dadicate', 'DedicateController@dedicate')->middleware('auth');

// Setting
Route::get('/setting', function ($id) {
    
});


// Unuse 

Route::get('/test/{user_id}', function ($user_id) {

    $user = App\User::find($user_id);
    $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;
    // auth()->user()->following()->toggle($user->profile);

    dd($follows);
    $playlist = App\Playlist::find(12);

    $playlist->songs()->syncWithoutDetaching([3]);
    // $album = App\Album::find(12);
    
    
    dd($playlist->songs);


    $songs = App\Song::where('title', 'like', '%a%')->get();
    foreach ($songs as $song) {
        echo $song->id;
    }
    dd($songs);
    // $user = App\User::find(2);
    // dd($user->album->last());
    $album = App\Album::where('user_id', '2')->get();
    dd($album);

    // Carbon::parse()->format();

    $song = App\Song::inRandomOrder()->limit(1)->get();
    dd($song[0]->id);

    dd();
    return view('includes.album-song');
    // strtotim
    $album = \App\Album::findOrFail(16);
    $song = \App\Song::findOrFail(5);
    // dd($album->song->album);
    foreach ($album->song as $song) {
        echo $song->title;
        echo $song->album->user->profile->name;
    }
    dd($album->song);

    return view('album.index');
    // dd(User::findOrFail($user_id));

    //     $categories = SongCategory::select('id', 'name')->get();

//     return view('includes/create-edit-song', compact('categories'));
    
    
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


