<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


class ArtistController extends Controller
{

    public function __construct()
    {
        $this->middleware('artist');
    }

    public function home() {
        return view('artist.home');
    }

    public function audience() {
        $user = User::findOrFail(auth()->id());
        $followersCount = Cache::remember('count.follower.' . $user->id, now()->addSecond(30), function () use($user) {
            return $user->profile->followers->count();
        });


        $totalListeners = 0;
        foreach ($user->song as $song) {
            $totalListeners += $song->listener;
        }
        // dd($user->song);


        return view('artist.audience', compact('followersCount', 'totalListeners'));
    }

    public function albums() {
        $albums = auth()->user()->album;
        return view('artist.album', compact('albums'));
    }

    public function songs() {
        $songs = auth()->user()->song;
        // dd($songs);
        return view('artist.song', compact('songs'));
    }
}
