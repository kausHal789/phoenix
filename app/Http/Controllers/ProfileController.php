<?php

namespace App\Http\Controllers;

use App\Album;
use App\Playlist;
use App\Profile;
use App\Rules\ImageFileFormat;
use Intervention\Image\Facades\Image;
use App\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $user = User::findOrFail($user_id);
        
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $followersCount = Cache::remember('count.follower.' . $user->id, now()->addSecond(30), function () use($user) {
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.' . $user->id, now()->addSecond(30), function () use($user) {
            return $user->following->count();
        });

        $userType = ($user->role_id === 2) ? 'ARTIST' : 'USER';
        $albums = $user->album;
        $latestRealeasAlbums = Album::where('user_id', $user_id)->latest()->limit(2)->get();
        $songs = $user->song()->orderBy('listener', 'DESC')->limit(5)->get();
        $playlists = $user->playlist;

        $collectionType = null;
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('profile.show', compact('user', 'albums', 'latestRealeasAlbums', 'songs', 'playlists', 'userType', 'collectionType', 'follows', 'followingCount', 'followersCount')) . ''
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($profile_id)
    {   
        $user= User::findOrFail($profile_id);
        // $profile = $user->profile;
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('profile.edit', compact('user')) . ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        
        $validatedData = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'profileImage' => [new ImageFileFormat, 'max:2048'], // Make image optional
            'coverImage' => [new ImageFileFormat, 'max:2048']
        ]);
        
        if(!$validatedData->passes()) {
            return response()->json([
                'result' => false,
                'status' => 400,
                'message' => $validatedData->errors()->all(),
            ]);
        }

        $userProfile = Profile::findOrFail($user_id);
        $userProfile->name = request()->name;
        
        if($request->profileImage) {
            $ProfilePath = $request['profileImage']->store('image', 'public');
            $image = Image::make(public_path("storage/$ProfilePath"))->resize(150, 150);
            $image->save();
            $userProfile->image = $ProfilePath;
        }
        if($request->coverImage) {
            $coverPath = $request['coverImage']->store('image', 'public');
            $image = Image::make(public_path("storage/$coverPath"))->resize(1500, 300);
            $image->save();
            $userProfile->cover_image = $coverPath;
        }

        $userProfile->save();

        return response()->json([
            'result' => true,
            'status' => 202,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
