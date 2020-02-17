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
           $ele = "<div class='col-3'>
                <div class='gridViewItem mb-4'>
                    <img src='/storage/$data->img_url' alt='album image' class='w-100 h-100 img-fluid'>
                    <div class='gridViewInfo'>$data->name</div>
                </div>
            </div>";
            
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
                'status' => 500
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
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        return response()->json([
            'result' => 'This is delete album'
        ]);
    }
}
