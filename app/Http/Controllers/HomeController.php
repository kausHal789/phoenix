<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = Album::latest()->limit(10)->get();
        $notificationsCount = auth()->user()->unreadNotifications->count();
        $notifications = auth()->user()->notifications;
        // ->where('type', '=', 'App\Notifications\FollowNotification')
        // ->where('type', '=', 'App\Notifications\DedicateSong')
        // foreach ($notifications as $notification) {
            // dd($notification->data);
            // foreach ($notification->data as $key => $value) {
            //     echo $key ."=" . $value . "<br>";
            // } 
        // }
        // dd($notifications);
        return view('index', compact('albums', 'notificationsCount', 'notifications'));
    }

    public function notificationMarkAsRead() {
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }

    }
}
