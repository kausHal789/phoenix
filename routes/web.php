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

Auth::routes();


// Admin (admin)
Route::get('/home/admin', 'AdminController@home')->name('admin.home');
Route::get('/user/admin', 'AdminController@user')->name('admin.user');
Route::get('/user/activate/{user_id}/admin', 'AdminController@userActivate')->name('admin.activate.user');
Route::get('/user/deactivate/{user_id}/admin', 'AdminController@userDeactivate')->name('admin.deactivate.user');
Route::get('/album/admin', 'AdminController@album')->name('admin.album');
Route::get('/album/activate/{album_id}/admin', 'AdminController@albumActivate')->name('admin.activate.album');
Route::get('/album/deactivate/{album_id}/admin', 'AdminController@albumDeactivate')->name('admin.deactivate.album');
Route::get('/playlist/admin', 'AdminController@playlist')->name('admin.playlist');
Route::get('/playlist/activate/{playlist_id}/admin', 'AdminController@playlistActivate')->name('admin.activate.playlist');
Route::get('/playlist/deactivate/{playlist_id}/admin', 'AdminController@playlistDeactivate')->name('admin.deactivate.playlist');
Route::get('/song/admin', 'AdminController@song')->name('admin.song');
Route::get('/song/activate/{song_id}/admin', 'AdminController@songActivate')->name('admin.activate.song');
Route::get('/song/deactivate/{song_id}/admin', 'AdminController@songDeactivate')->name('admin.deactivate.song');
Route::get('/categories/admin', 'AdminController@categories')->name('admin.song.categories');


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/song', 'SongController@index')->middleware('auth')->name('song.index');
Route::get('/artist/song/{album_id}', 'SongController@create')->middleware('artist')->name('song.create');
Route::post('/song', 'SongController@store')->middleware('artist')->name('song.store');
Route::get('/song/{song_id}', 'SongController@edit')->middleware('artist')->name('song.edit');
Route::patch('/song/{song_id}', 'SongController@update')->middleware('artist')->name('song.update');
Route::delete('/song/{song_id}', 'SongController@destroy')->middleware('artist')->name('song.delete');
// Song JSON
Route::get('/songJSON/{song_id}', 'SongController@showJSON')->middleware('auth')->name('songJSON.show');


// Artist (artist)
Route::get('/artist/home', 'ArtistController@home')->name('artist.home');
Route::get('/artist/audience', 'ArtistController@audience')->name('artist.audience');
Route::get('/artist/albums', 'ArtistController@albums')->name('artist.albums');
Route::get('/artist/songs', 'ArtistController@songs')->name('artist.songs');


// Album (artist)
Route::get('/album', 'AlbumController@index')->name('album.index');
Route::get('/album/create', 'AlbumController@create')->name('album.create');
Route::post('/album', 'AlbumController@store')->name('album.store');
Route::get('/album/{album_id}', 'AlbumController@show')->name('album.show');
Route::get('/album/{album_id}/edit', 'AlbumController@edit')->name('album.edit');
Route::patch('/album/{album_id}', 'AlbumController@update')->name('album.update');
Route::delete('/album/{album_id}', 'AlbumController@destroy')->name('album.delete');
// JSON
Route::get('/albumJSON/{album_id}', 'AlbumController@albumJSON')->middleware('auth')->name('albumJSON.show');


// Playlist (auth)
Route::get('/playlist', 'PlaylistController@index')->name('playlist.index');
Route::get('/playlist/create', 'PlaylistController@create')->name('playlist.create');
Route::post('/playlist', 'PlaylistController@store')->name('playlist.store');
Route::get('/playlist/{playlist_id}', 'PlaylistController@show')->name('playlist.show');
Route::get('/playlist/{playlist_id}/edit', 'PlaylistController@edit')->name('playlist.edit');
Route::patch('/playlist/{playlist_id}', 'PlaylistController@update')->name('playlist.update');
Route::delete('/playlist/{playlist_id}', 'PlaylistController@destroy')->name('playlist.delete');
// JSON
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

// Search (Auth)
Route::get('/search', 'SearchController@getSeachPage');
Route::get('/search/result', 'SearchController@seachResult');

// Dadicate (Auth)
Route::get('/dadicate/search', 'DedicateController@dedicateSearch')->name('dadicate.search');
Route::post('/dadicate', 'DedicateController@dedicate')->name('dedicate.dadicate');

// Mark Notification as read
Route::get('/notification/markAsRead', 'HomeController@notificationMarkAsRead')->name('notification.read');


// Unuse 

Route::get('/test', function () {

    $album = App\Album::withTrashed()->where('id', '=', 1)->get();
    // $collectionType = 'ALBUM';
    // return view('album.show', compact('album', 'collectionType'));
   dd($album);

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
})->name('test');


