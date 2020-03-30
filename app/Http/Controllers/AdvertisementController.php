<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Rules\ImageFileFormat;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        $isAdminAdvertisement = true;
        $advertisements = Advertisement::all(); 
        // dd($advertisements);
        return view('admin.advertisement', compact('advertisements', 'isAdminAdvertisement'));
    }

    public function store() {

        request()->validate([
            'title' => ['bail', 'required', 'string', 'max:50'],
            'url' => ['bail', 'required', 'url'],
            'image' => [new ImageFileFormat, 'max:2048']
        ]);
        // dd('ok');
        if(request()->image) {
            $imagePath = request()->image->store('image', 'public');
            $image = Image::make(public_path("storage/$imagePath"))->resize(1500, 300);
            $image->save();
        }

        Advertisement::create([
            'title' => request()->title,
            'url' => request()->url,
            'image' => $imagePath
        ]);

        return redirect('/advertisement');
    }

    public function edit($id) {
        $isAdminAdvertisement = true;
        $advertisements = Advertisement::all(); 
        $editadvertisement = Advertisement::findOrFail($id);
        return view('admin.advertisement', compact('advertisements', 'isAdminAdvertisement', 'editadvertisement'));
    }

    public function update($id) {
        request()->validate([
            'title' => ['bail', 'required', 'string', 'max:50'],
            'url' => ['bail', 'required', 'url']
        ]);

        $add = Advertisement::findOrFail($id);

        if(request()->image) {
            $imagePath = request()->image->store('image', 'public');
            $image = Image::make(public_path("storage/$imagePath"))->resize(1500, 300);
            $image->save();
            $add->image = $imagePath;
        }

        $add->title = request()->title;
        $add->url = request()->url;

        $add->save();

        return redirect('/advertisement');
    }

    public function destroy($id) {
        Advertisement::findOrFail($id)->delete();
        return redirect('/advertisement');  
    }
}
