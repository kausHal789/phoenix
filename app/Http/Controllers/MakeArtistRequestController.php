<?php

namespace App\Http\Controllers;

use App\Mail\ClaimArtistProfileMail;
use App\MakeArtistRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MakeArtistRequestController extends Controller
{
    public function index() {

    }

    public function store(Request $request) {
        request()->validate([
            'about' => ['required', 'string', 'max:200'],
            'link' => ['required', 'url']
        ]);

        $user = User::findOrFail(request()->id);
        $user->makeartistrequest()->create([
            'url' => request()->link
        ]);
        $user->profile->about = request()->about;
        $user->profile->save();
        Mail::to(request()->email)->send(new ClaimArtistProfileMail);
        return redirect('/');
    }

    public function claimArtist() {
        return view('claim-artist');
    }

    public function claimArtistAccess() {
        return view('claim-artist-access');
    }
    
    public function claimAccessArtist() {
        return view('claim-access-artist');
    }

    public function claimAccessArtistSearch() {
        $term = request()->term;
        if($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                'data' => '<div class=\'h1 m-5\'>Empty data are not searchable</div>'
            ]);    
        }
        $users = User::join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.role_id', '!=', 1)
            ->where('users.role_id', '=', 3)
            ->where('profiles.name', 'like', $term . '%')
            ->get();
    
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('includes.userSearch-result', compact('users')) . ''
        ]);
    }

    public function claimArtistProfile($user_id) {
        $user = User::findOrFail($user_id);
        return view('claim-artist-profile', compact('user'));
    }
}
