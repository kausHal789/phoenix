<?php

namespace App\Http\Controllers;

use App\Album;
use App\Song;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getSeachPage()
    {
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('includes.search') . ''
        ]);
    }

    public function seachResult()
    {
        $term = request()->term;
        if ($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                'data' => '<div class=\'h1 m-5\'>You want to search empty data</div>'
            ]);
        }
        // Auth
        $songs = Song::where('title', 'like', '%' . $term . '%')->get();
        $albums = Album::where('name', 'like', '%' . $term . '%')->get();

        $artists = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->where('users.role_id', '=', 2)
            ->where('profiles.name', 'like', '%' . $term . '%')
            ->get();

        $peoples = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->where('users.role_id', '=', 3)
            ->where('profiles.name', 'like', '%' . $term . '%')
            ->get();


        // $artists = User::where('role_id', 2)->where('id', '!=', auth()->id())->where('username', 'like', '%' . $term . '%')->get();
        // $peoples = User::where('role_id', 3)->where('id', '!=', auth()->id())->where('username', 'like', '%' . $term . '%')->get();
        $collectionType = 'SEARCHDATA';
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('includes.search-result', compact('songs', 'albums', 'artists', 'peoples', 'collectionType')) . ''
        ]);
    }
}
