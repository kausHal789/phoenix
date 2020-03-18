<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;

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
            'url' => ['bail', 'required', 'url']
        ]);

        Advertisement::create([
            'title' => request()->title,
            'url' => request()->url
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

        Advertisement::findOrFail($id)->update([
            'title' => request()->title,
            'url' => request()->url
        ]);

        return redirect('/advertisement');
    }

    public function destroy($id) {
        Advertisement::findOrFail($id)->delete();
        return redirect('/advertisement');  
    }
}
