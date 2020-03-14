<?php

namespace App\Http\Controllers;

use App\Album;
use App\Playlist;
use App\Song;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function home() {
        $isAdminHome = true;

        $totleUsers = User::all()->count();
        $totleSongs = Song::all()->count();
        $totleAlbums = Album::all()->count();
        $totlePlaylists = Playlist::all()->count();

        // dd($totleUsers);
        return view('admin.home', compact('isAdminHome', 'totleUsers', 'totleSongs', 'totleAlbums', 'totlePlaylists'));
    }

    public function user() {
        $users = User::withTrashed()->get();
        $isAdminUser = true;
        return view('admin.user', compact('isAdminUser', 'users'));
    }

    public function userDeactivate($user_id) {
        $result = User::findOrFail($user_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }
    
    public function userActivate($user_id) {
        $result = User::withTrashed()->where('id', '=', $user_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }


    public function album() {
        $albums = Album::withTrashed()->get();
        $isAdminAlbum = true;
        return view('admin.album', compact('isAdminAlbum', 'albums'));
    }

    public function albumDeactivate($album_id) {
        $result = Album::findOrFail($album_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }
    
    public function albumActivate($album_id) {
        $result = Album::withTrashed()->where('id', '=', $album_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function playlist() {
        $isAdminPlaylist = true;
        $playlists = Playlist::withTrashed()->get();
        // dd($playlists);
        return view('admin.playlist', compact('isAdminPlaylist', 'playlists'));
    }

    public function playlistDeactivate($playlist_id) {
        $result = Playlist::findOrFail($playlist_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }
    
    public function playlistActivate($playlist_id) {
        $result = Playlist::withTrashed()->where('id', '=', $playlist_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function song() {
        $isAdminSong = true;
        $songs = Song::withTrashed()->get();
        // dd($songs->album);
        return view('admin.song', compact('isAdminSong', 'songs'));
    }

    public function songDeactivate($song_id) {
        $result = Song::findOrFail($song_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }
    
    public function songActivate($song_id) {
        $result = Song::withTrashed()->where('id', '=', $song_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function categories() {
        $categories = DB::table('song_categories')->get();
        // dd($categories);
        return view('admin.categories', compact('categories'));
    }
}
