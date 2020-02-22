<?php

namespace App\Http\Controllers;

use App\Album;
use App\Rules\ImageFileFormat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;


class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('artist');
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
        return response()->json([
            'result' => true,
            'status' => 202,
            'modal' => "". view('includes.modal.add-edit-album') . ""
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'album_image' => ['required', new ImageFileFormat, 'max:2048', ],
            'album_name' => 'required|string'
        ]);

        if(!$validatedData->passes()) {
            return response()->json([
                'message' => $validatedData->errors()->all(),
                'result' => 'fail',
                'status' => 500
            ]);
        }

        $imagePath = $request['album_image']->store('image', 'public');
        $image = Image::make(public_path("storage/$imagePath"))->resize(200, 200);
        $image->save();

        // Store in Album table
        $data = auth()->user()->album()->create([
            'name' => $request['album_name'],
            'img_url' => $imagePath
        ]);

        if($data) {
        //    $ele = "<div class='col-3'>
        //         <div class='gridViewItem mb-4'>
        //             <img src='/storage/$data->img_url' alt='album image' class='w-100 h-100 img-fluid'>
        //             <div class='gridViewInfo'>$data->name</div>
        //         </div>
        //     </div>";
            $album = $data;
            $ele = "".view('includes.album', compact('album'))."";
            
            return response()->json([
                // 'data' => $data,
                'result' => 'success',
                'status' => 202, 
                'ele' => $ele
            ]);
        } else {
            return response()->json([
                'message' => 'Server Problem',
                'result' => 'fail',
                'status' => 400
            ]);    
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit($album_id)
    {
        $album = Album::findOrFail($album_id);
        $isAlbumEdit = true;
        return response()->json([
            'result' => true,
            'status' => 202,
            'modal' => "". view('includes.modal.add-edit-album', compact('isAlbumEdit', 'album')) . ""
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $album_id)
    {
        $validatedData = Validator::make($request->all(), [
            'album_image' => [new ImageFileFormat, 'max:2048' ], // Make image optional
            'album_name' => 'required|string'
        ]);
        
        if(!$validatedData->passes()) {
            return response()->json([
                'result' => false,
                'status' => 400,
                'message' => $validatedData->errors()->all(),
            ]);
        }

        $album = Album::findOrFail($album_id);
        $album->name = $request->album_name;

        if($request->album_image) {
            $imagePath = $request['album_image']->store('image', 'public');
            $image = Image::make(public_path("storage/$imagePath"))->resize(200, 200);
            $image->save();
            $album->img_url = $imagePath;
        }
        $result = $album->save();
        return response()->json([
            'result' => $result,
            'message' => 'success',
            'status' => 202,
            'newAlbum' => '' . view('includes.album', compact('album')) . ''
        ], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($album_id) {
        $album = Album::findOrFail($album_id);
        
        if($result = $album->delete()) {
            if(!request()->isDashboard) {
                return redirect('/artist/dashboard', 202);
            }
            
            return response()->json([
                'result' => 'success',
                'data' => $result,
                'status' => 202
            ]);
        } else {
            return response()->json([
                'result' => 'fail',
                'data' => 'Server Problem in deleting',
                'status' => 500
            ]);
        }
    }
}
