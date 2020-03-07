<?php

namespace App\Http\Controllers;

use App\Dedicate;
use App\Profile;
use App\Song;
use App\User;
use Illuminate\Http\Request;

class DedicateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dedicate() {
        $song = Song::findOrFail(request()->song_id);
        $dedicatedUser = User::findOrFail(request()->to[0]); 
        $dedicaterUser = User::findOrFail(auth()->id());
        $dedicatedUser->notify(new \App\Notifications\DedicateSong($dedicaterUser, $song));
        Dedicate::create([
            'song_id' => $song->id,
            'to_id' => $dedicatedUser->id,
            'from_id' => $dedicaterUser->id
        ]);
        return response()->json([
            'result' => true,
            'status' => 200,
        ]);
    }

    public function dedicateSearch() {

        $term = request()->term;
        if($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                'data' => '<div class=\'h1 m-5\'>Empty data are not searchable</div>'
            ]);    
        }
        $usersProfiles = Profile::where('id', '!=', auth()->id())->where('name', 'like', '%' . $term .'%')->get();
    
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('includes.dadicate-result', compact('usersProfiles')) . ''
        ]);
    }
}