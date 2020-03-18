<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Album;
use App\Feedback;
use App\Playlist;
use App\Profile;
use App\Song;
use App\SongCategory;
use App\Subscribe;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function home()
    {
        $isAdminHome = true;

        $totleUsers = User::all()->where('role_id', '!=', 1)->count();
        $artistCount = User::all()->where('role_id', '=', 2)->count();
        $endUserCount = User::all()->where('role_id', '=', 3)->count();
        $blockUserCount = User::onlyTrashed()->where('role_id', '!=', 1)->count();
        $blockArtistCount = User::onlyTrashed()->where('role_id', '=', 2)->count();
        $blockEndUserCount = User::onlyTrashed()->where('role_id', '=', 3)->count();

        $totleSongs = Song::all()->count();
        $blockSongCount = Song::onlyTrashed()->count();
        
        $totleAlbums = Album::all()->count();
        $blockAlbumCount = Album::onlyTrashed()->count();


        $totlePlaylists = Playlist::all()->count();
        $blockPlaylistCount = Playlist::onlyTrashed()->count();
       
        $subscriberCount = Subscribe::all()->count();
        $feedbackCount = Feedback::all()->count();

        // dd($totleUsers);
        return view(
            'admin.home',
            compact(
                'isAdminHome',
                'totleUsers',
                'totleSongs',
                'totleAlbums',
                'totlePlaylists',
                'subscriberCount',
                'artistCount',
                'feedbackCount',
                'endUserCount',
                'blockUserCount',
                'blockEndUserCount',
                'blockArtistCount', 
                'blockSongCount',
                'blockAlbumCount',
                'blockPlaylistCount',
            )
        );
    }

    public function user()
    {
        $endUsers = User::withTrashed()->where('role_id', '=', 3)->get();
        $artists = User::withTrashed()->where('role_id', '=', 2)->get();

        $totalUser = $this->totalUser();

        $isAdminUser = true;
        return view('admin.user', compact('isAdminUser', 'endUsers', 'artists', 'totalUser'));
    }

    public function usersearch()
    {
        $term = request()->term;
        if ($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                // 'data' => $term
                'data' => '<div class=\'h1 m-5\'>You can not search empty data</div>'
            ]);
        }
        $users = User::withTrashed()
            ->join('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('users.id', '!=', auth()->id())
            ->where('users.role_id', '!=', 1)
            ->where('profiles.name', 'like', '%' . $term . '%')
            ->get();

        // $profiles = Profile::where('id', '!=', auth()->id())->where('id', '!=', 1)->where('name', 'like', '%' . $term . '%')->get();
        $userSearch = true;
        return response()->json([
            'result' => true,
            'status' => 200,
            // 'data' => $users
            'data' => '' . view('admin.includes.searchResult', compact('users', 'userSearch')) . ''
        ]);
    }

    public function userDeactivate($user_id)
    {
        $user = User::findOrFail($user_id);

        foreach ($user->song as $song) {
            $song->delete();
        }
        foreach ($user->album as $album) {
            $album->delete();
        }
        foreach ($user->playlist as $playlist) {
            $playlist->delete();
        }
        $user->profile->delete();
        $user->delete();

        return response()->json([
            'result' => true,
            'status' => 200,
            'deactivate' => true,
        ]);
    }

    public function userActivate($user_id)
    {
        User::withTrashed()->where('id', '=', $user_id)->restore();
        $user = User::findOrFail($user_id);
        Profile::withTrashed()->where('user_id', '=', $user_id)->restore();
        Album::withTrashed()->where('user_id', '=', $user_id)->restore();
        Playlist::withTrashed()->where('user_id', '=', $user_id)->restore();

        foreach ($user->album as $album) {
            Song::withTrashed()->where('album_id', '=', $album->id)->restore();
        }
        return response()->json([
            'result' => true,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function album()
    {
        $albums = Album::withTrashed()->get();
        $isAdminAlbum = true;
        return view('admin.album', compact('isAdminAlbum', 'albums'));
    }

    public function albumDeactivate($album_id)
    {
        Song::where('album_id', '=', $album_id)->delete();
        $result = Album::findOrFail($album_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }

    public function albumActivate($album_id)
    {
        Song::withTrashed()->where('album_id', '=', $album_id)->restore();
        $result = Album::withTrashed()->where('id', '=', $album_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function albumsearch() {
        $term = request()->term;
        if ($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                // 'data' => $term
                'data' => '<div class=\'h1 m-5\'>You can not search empty data</div>'
            ]);
        }
        $albums = Album::withTrashed()->where('name', 'like', '%' . $term . '%')->get();

        $albumSearch = true;
        return response()->json([
            'result' => true,
            'status' => 200,
            // 'data' => $users
            'data' => '' . view('admin.includes.searchResult', compact('albums', 'albumSearch')) . ''
        ]);
    }

    public function playlist()
    {
        $isAdminPlaylist = true;
        $playlists = Playlist::withTrashed()->get();
        // dd($playlists);
        return view('admin.playlist', compact('isAdminPlaylist', 'playlists'));
    }

    public function playlistDeactivate($playlist_id)
    {
        $result = Playlist::findOrFail($playlist_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }

    public function playlistActivate($playlist_id)
    {
        $result = Playlist::withTrashed()->where('id', '=', $playlist_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function playlistsearch() {
        $term = request()->term;
        if ($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                // 'data' => $term
                'data' => '<div class=\'h1 m-5\'>You can not search empty data</div>'
            ]);
        }
        $playlists = Playlist::withTrashed()->where('name', 'like', '%' . $term . '%')->get();

        $playlistSearch = true;
        return response()->json([
            'result' => true,
            'status' => 200,
            // 'data' => $users
            'data' => '' . view('admin.includes.searchResult', compact('playlists', 'playlistSearch')) . ''
        ]);
    }

    public function song()
    {
        $isAdminSong = true;
        $songs = Song::withTrashed()->get();
        // dd($songs->album);
        return view('admin.song', compact('isAdminSong', 'songs'));
    }

    public function songDeactivate($song_id)
    {
        $result = Song::findOrFail($song_id)->delete();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'deactivate' => true,
        ]);
    }

    public function songActivate($song_id)
    {
        $result = Song::withTrashed()->where('id', '=', $song_id)->restore();
        return response()->json([
            'result' => $result,
            'status' => 200,
            'activate' => true,
        ]);
    }

    public function songsearch() {
        $term = request()->term;
        if ($term == null) {
            return response()->json([
                'result' => true,
                'status' => 200,
                // 'data' => $term
                'data' => '<div class=\'h1 m-5\'>You can not search empty data</div>'
            ]);
        }
        $songs = Song::withTrashed()->where('title', 'like', '%' . $term . '%')->get();

        $songSearch = true;
        return response()->json([
            'result' => true,
            'status' => 200,
            // 'data' => $users
            'data' => '' . view('admin.includes.searchResult', compact('songs', 'songSearch')) . ''
        ]);
    }

    public function categories()
    {
        $isAdminSongCategories = true;
        // $categories = DB::table('song_categories')->get();
        $categories = SongCategory::all();

        // dd($categories);
        return view('admin.categories', compact('categories', 'isAdminSongCategories'));
    }

    public function categorydelete($category_id) {
        SongCategory::findOrFail($category_id)->delete();
    }

    public function categorystore() {
        request()->validate([
            'name' => ['bail', 'required', 'string', 'max:20']
        ]);
        SongCategory::create([
            'name' => request()->name
        ]);
        return redirect()->route('admin.song.categories');
    }

    public function subscription() {
        $isAdminSubscription = true;
        $subscriptions = Subscribe::all();
        return view('admin.subscription', compact('subscriptions', 'isAdminSubscription'));
    }

    public function subscriptiondelete($subscription_id) {
        Subscribe::findOrFail($subscription_id)->delete();
    }

    public function feedback() {
        $feedbacks = Feedback::all();
        $latestFeedbacks = Feedback::limit(2)->get();
        $singalFeedbacks = Feedback::latest()->limit(1)->get();
        return view('admin.feedback', compact('feedbacks', 'latestFeedbacks', 'singalFeedbacks'));
    }

    public function payment() {
        $subscriptions = Subscription::all();
        $daysubscriptions = Subscription::all()->where('stripe_plan', '=', 'Day')->count();
        $monthsubscriptions = Subscription::all()->where('stripe_plan', '=', 'Month')->count();
        $yearsubscriptions = Subscription::all()->where('stripe_plan', '=', 'Year')->count();
        // dd($subscriptions);
        return view('admin.payment', compact('subscriptions', 'yearsubscriptions', 'monthsubscriptions', 'daysubscriptions'));
    }


    private function totalUser() {
        return User::withTrashed()->where('role_id', '!=', 1)->count();
    }
}
