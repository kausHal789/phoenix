<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Album;
use App\Playlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function index() {
        $albums = Album::all()->random()->limit(3)->get();
        $playlists = Playlist::all()->random()->limit(3)->get();
        $advertisements = Advertisement::latest()->limit(3)->get();
        return view('home', compact('albums', 'playlists', 'advertisements'));
     }


    public function home()
    {
        $albums = Album::latest()->limit(10)->get();
        $notificationsCount = auth()->user()->unreadNotifications->count();
        $notifications = auth()->user()->notifications;
        return view('index', compact('albums', 'notificationsCount', 'notifications'));
    }

    public function notificationMarkAsRead() {
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }

    }
}
