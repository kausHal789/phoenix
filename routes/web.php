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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@home')->name('home')->middleware('auth');
Route::get('/', 'HomeController@index')->name('index');
Route::post('/feedback', 'FeedbackController@store')->name('feedback');
Route::post('/subscription', 'SubscribeController@store')->name('subscription');

Route::group(['prefix' => 'claim'], function () {
  Route::get('/artist', 'MakeArtistRequestController@claimArtist')->name('claim.artist');
  Route::get('/access', 'MakeArtistRequestController@claimArtistAccess')->name('claim.artist.access');
  Route::get('/access/artist', 'MakeArtistRequestController@claimAccessArtist')->name('claim.access.artist');
  Route::get('/access/artist/search', 'MakeArtistRequestController@claimAccessArtistSearch')->name('claim.access.artist.search');
  Route::get('/profile/{user_id}/artist', 'MakeArtistRequestController@claimArtistProfile')->name('claim.profile.artist');
  Route::post('/profile/request', 'MakeArtistRequestController@store')->name('claim.profile.request');
});

// Admin (admin)
Route::group(['prefix' => 'admin'], function () {
  Route::get('/home', 'AdminController@home')->name('admin.home');

  Route::group(['prefix' => 'user'], function () {
    Route::get('/', 'AdminController@user')->name('admin.user');
    Route::get('/activate/{user_id}', 'AdminController@userActivate')->name('admin.activate.user');
    Route::get('/deactivate/{user_id}', 'AdminController@userDeactivate')->name('admin.deactivate.user');
    Route::get('/search', 'AdminController@usersearch')->name('admin.user.search');
  });

  Route::group(['prefix' => 'album'], function () {
    Route::get('/', 'AdminController@album')->name('admin.album');
    Route::get('/activate/{album_id}', 'AdminController@albumActivate')->name('admin.activate.album');
    Route::get('/deactivate/{album_id}', 'AdminController@albumDeactivate')->name('admin.deactivate.album');
    Route::get('/search', 'AdminController@albumsearch')->name('admin.album.search');
  });

  Route::group(['prefix' => 'playlist'], function () {
    Route::get('/', 'AdminController@playlist')->name('admin.playlist');
    Route::get('/activate/{playlist_id}', 'AdminController@playlistActivate')->name('admin.activate.playlist');
    Route::get('/deactivate/{playlist_id}', 'AdminController@playlistDeactivate')->name('admin.deactivate.playlist');
    Route::get('/search', 'AdminController@playlistsearch')->name('admin.playlist.search');
  });

  Route::group(['prefix' => 'song'], function () {
    Route::get('/', 'AdminController@song')->name('admin.song');
    Route::get('/activate/{song_id}', 'AdminController@songActivate')->name('admin.activate.song');
    Route::get('/deactivate/{song_id}', 'AdminController@songDeactivate')->name('admin.deactivate.song');
    Route::get('/search', 'AdminController@songsearch')->name('admin.song.search');
  });

  Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'AdminController@categories')->name('admin.song.categories');
    Route::post('/store', 'AdminController@categorystore')->name('admin.song.categories.store');
    Route::get('/{category_id}', 'AdminController@categorydelete')->name('admin.song.categories.delete');
  });

  Route::group(['prefix' => 'subscription'], function () {
    Route::get('/', 'AdminController@subscription')->name('admin.subscription');
    Route::get('/{subscription_id}', 'AdminController@subscriptiondelete')->name('admin.subscription.delete');
  });


  Route::group(['prefix' => 'request'], function () {
    Route::get('/', 'AdminController@request')->name('admin.request');
    Route::get('/approve/{id}', 'AdminController@requestApprove')->name('admin.request.approve');
    Route::get('/cancel/{id}', 'AdminController@requestCancel')->name('admin.request.cancel');
  });

  Route::get('/feedback', 'AdminController@feedback')->name('admin.feedback');
  Route::get('/payment', 'AdminController@payment')->name('admin.payment');
});

// advertisement
Route::group(['prefix' => 'advertisement'], function () {
  Route::get('/', 'AdvertisementController@index')->name('admin.advertisement');
  Route::post('/', 'AdvertisementController@store')->name('advertisement.store');
  Route::get('/{id}', 'AdvertisementController@edit')->name('advertisement.edit');
  Route::patch('/{id}', 'AdvertisementController@update')->name('advertisement.update');
  Route::delete('/{id}', 'AdvertisementController@destroy')->name('advertisement.delete');
});

// Primium (auth)
Route::group(['prefix' => 'primium'], function () {
  Route::get('/', 'PrimiumController@show')->name('primium.show')->middleware('verified');
  Route::get('/create', 'PrimiumController@create')->name('primium.create');
  Route::post('/payment', 'PrimiumController@payment')->name('primium.payment');
});

// Song (artist)
Route::group(['prefix' => 'song'], function () {
  Route::get('/', 'SongController@index')->middleware('auth')->name('song.index');
  Route::get('/album/{album_id}', 'SongController@create')->middleware('artist')->name('song.create');
  Route::post('/', 'SongController@store')->middleware('artist')->name('song.store');
  Route::get('/{song_id}', 'SongController@edit')->middleware('artist')->name('song.edit');
  Route::patch('/{song_id}', 'SongController@update')->middleware('artist')->name('song.update');
  Route::delete('/{song_id}', 'SongController@destroy')->middleware('artist')->name('song.delete');
});
// Song JSON
Route::get('/songJSON/{song_id}', 'SongController@showJSON')->middleware('auth')->name('songJSON.show');

// Artist (artist)

Route::group(['prefix' => 'artist'], function () {
  Route::get('/home', 'ArtistController@home')->name('artist.home')->middleware('verified');
  Route::get('/audience', 'ArtistController@audience')->name('artist.audience');
  Route::get('/albums', 'ArtistController@albums')->name('artist.albums');
  Route::get('/songs', 'ArtistController@songs')->name('artist.songs');
});

// Album (artist)
Route::group(['prefix' => 'album'], function () {
  Route::get('/', 'AlbumController@index')->name('album.index');
  Route::get('/create', 'AlbumController@create')->name('album.create');
  Route::post('/', 'AlbumController@store')->name('album.store');
  Route::get('/{album_id}', 'AlbumController@show')->name('album.show');
  Route::get('/{album_id}/edit', 'AlbumController@edit')->name('album.edit');
  Route::patch('/{album_id}', 'AlbumController@update')->name('album.update');
  Route::delete('/{album_id}', 'AlbumController@destroy')->name('album.delete');
});
// JSON
Route::get('/albumJSON/{album_id}', 'AlbumController@albumJSON')->middleware('auth')->name('albumJSON.show');

// Playlist (auth)
Route::group(['prefix' => 'playlist'], function () {
  Route::get('/', 'PlaylistController@index')->name('playlist.index');
  Route::get('/create', 'PlaylistController@create')->name('playlist.create');
  Route::post('/', 'PlaylistController@store')->name('playlist.store');
  Route::get('/{playlist_id}', 'PlaylistController@show')->name('playlist.show');
  Route::get('/{playlist_id}/edit', 'PlaylistController@edit')->name('playlist.edit');
  Route::patch('/{playlist_id}', 'PlaylistController@update')->name('playlist.update');
  Route::delete('/{playlist_id}', 'PlaylistController@destroy')->name('playlist.delete');
  Route::get('/{playlist_id}/song/{song_id}/attach', 'PlaylistController@playlistAttach')->name('playlistSYNCsong.attach');
  Route::get('/{playlist_id}/song/{song_id}/detach', 'PlaylistController@playlistDetach')->name('playlistSYNCsong.detach');
});
// JSON
Route::get('/playlistJSON/{playlist_id}', 'PlaylistController@playlistJSON')->name('playlistJSON.show');
Route::get('/playlistListJSON', 'PlaylistController@playlistListJSON')->name('playlistJSON.index');
// Playlist sync with song

// Follow the user (Auth)
Route::post('/follow/{user}', 'FollowsController@store')->name('follow-unfollow');
Route::post('/follownotification/{user}', 'FollowsController@notification')->name('follow.notification');

// Profile
Route::group(['prefix' => 'profile'], function () {
  Route::get('/{user_id}', 'ProfileController@show')->name('profile.show');
  Route::get('/{user_id}/edit', 'ProfileController@edit')->name('profile.edit');
  Route::patch('/{user_id}', 'ProfileController@update')->name('profile.update');
});

// Search (Auth)
Route::group(['prefix' => 'search'], function () {
  Route::get('/', 'SearchController@getSeachPage');
  Route::get('/result', 'SearchController@seachResult');
});

// Dadicate (Auth)
Route::group(['prefix' => 'dadicate'], function () {
  Route::get('/search', 'DedicateController@dedicateSearch')->name('dadicate.search');
  Route::post('/', 'DedicateController@dedicate')->name('dedicate.dadicate');
});

// Mark Notification as read
Route::get('/notification/markAsRead', 'HomeController@notificationMarkAsRead')->name('notification.read');
