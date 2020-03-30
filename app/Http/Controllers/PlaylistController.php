<?php

namespace App\Http\Controllers;

use App\Playlist;
use Illuminate\Http\Request;
use App\Rules\ImageFileFormat;
use Intervention\Image\Facades\Image;
use Validator;


class PlaylistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $playlists = auth()->user()->playlist;
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => '' . view('playlist.index', compact('playlists')) . ''
        ]);
    }

    public function create()
    {
        return response()->json([
            'result' => true,
            'status' => 202,
            'modal' => "". view('playlist.create-edit') . ""
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'playlist_image' => ['required', new ImageFileFormat, 'max:2048', ],
            'playlist_name' => 'required|string'
        ]);

        if(!$validatedData->passes()) {
            return response()->json([
                'message' => $validatedData->errors()->all(),
                'result' => 'fail',
                'status' => 400
            ]);
        }

        $imagePath = $request['playlist_image']->store('image', 'public');
        $image = Image::make(public_path("storage/$imagePath"))->resize(800, 800);
        $image->save();

        // Store in Playlist table
        $data = auth()->user()->playlist()->create([
            'name' => $request['playlist_name'],
            'img_url' => $imagePath
        ]);

        if($data) {
            $playlist = $data;
            $ele = "".view('includes.playlist-thumbnail', compact('playlist'))."";
            
            return response()->json([
                'result' => 'success',
                'status' => 202, 
                'ele' => $ele
            ]);
        } else {
            return response()->json([
                'message' => 'Server Problem',
                'result' => 'fail',
                'status' => 500
            ]);    
        }
    }

    public function show($playlist_id)
    {   
        $playlist = Playlist::findOrFail($playlist_id);
        $collectionType = 'PLAYLIST';
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => "" . view('playlist.show', compact('playlist', 'collectionType')) . ""
        ]);
    }

    public function edit($playlist_id)
    {
        $playlist = Playlist::findOrFail($playlist_id);
        $isPlaylistEdit = true;
        return response()->json([
            'result' => true,
            'status' => 202,
            'modal' => "". view('playlist.create-edit', compact('isPlaylistEdit', 'playlist')) . ""
        ]);
    }

    public function update(Request $request, $playlist_id)
    {
        $validatedData = Validator::make($request->all(), [
            'playlist_image' => [new ImageFileFormat, 'max:2048' ], // Make image optional
            'playlist_name' => 'required|string'
        ]);
        
        if(!$validatedData->passes()) {
            return response()->json([
                'result' => false,
                'status' => 400,
                'message' => $validatedData->errors()->all(),
            ]);
        }

        $playlist = Playlist::findOrFail($playlist_id);
        $playlist->name = $request->playlist_name;

        if($request->playlist_image) {
            $imagePath = $request['playlist_image']->store('image', 'public');
            $image = Image::make(public_path("storage/$imagePath"))->resize(800, 800);
            $image->save();
            $playlist->img_url = $imagePath;
        }
        $collection = $playlist;
        $collectionType = 'PLAYLIST';
        $result = $playlist->save();
        return response()->json([
            'result' => $result,
            'message' => 'success',
            'status' => 200,
            'newPlaylist' => '' . view('includes.album-playlist-header', compact('collection', 'collectionType')) . ''
        ]);
    }
    
    public function destroy($playlist_id) {
        $playlist = Playlist::findOrFail($playlist_id);
        
        if($result = $playlist->delete()) {
            $playlists = auth()->user()->playlist;

            return response()->json([
                'result' => 'success',
                'data' => '' . view('playlist.index', compact('playlists')) . '',
                'status' => 200
            ]);
        } else {
            return response()->json([
                'result' => 'fail',
                'data' => 'Server Problem in deleting',
                'status' => 500
            ]);
        }
    }

    public function playlistListJSON() {
        $playlists = auth()->user()->playlist;
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => [
                'playlists' => '' . view('includes.playlist-item', compact('playlists')) . ''
            ]
        ]);
    }

    public function playlistJSON($playlist_id) {
        $playlists = Playlist::findOrFail($playlist_id);
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => [
                'songs' => $playlists->songs
            ]
        ]);
    }

    public function playlistAttach($playlist_id, $song_id) {
        $playlist = Playlist::find($playlist_id);
        $playlist->songs()->syncWithoutDetaching([$song_id]);
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => ''
        ]);
    }

    public function playlistDetach($playlist_id, $song_id) {
        $playlist = Playlist::find($playlist_id);
        $playlist->songs()->detach([$song_id]);
        return response()->json([
            'result' => true,
            'status' => 200,
            'data' => ''
        ]);
    }
}
