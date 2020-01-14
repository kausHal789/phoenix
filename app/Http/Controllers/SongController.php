<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongPost;
use App\Song;
use App\SongCategory;
use FFMpeg\FFMpeg;
use Illuminate\Http\Request;

class SongController extends Controller
{
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
    $categories = SongCategory::select('id', 'name')->get();
    return \view('song.create',compact('categories'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreSongPost $request)
  {
    // Validation done in StoreSongPost. 

    $validatedData = $request->validated();
    dd($validatedData);

    $FFMpeg = FFMpeg::create([
      'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
      'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe'
    ]);

    $ffprobe = $FFMpeg->getFFProbe();

    $this->setDuration($ffprobe->format($request->file('audio'))->get('duration'));
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Song  $song
   * @return \Illuminate\Http\Response
   */
  public function show(Song $song)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Song  $song
   * @return \Illuminate\Http\Response
   */
  public function edit(Song $song)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Song  $song
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Song $song)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Song  $song
   * @return \Illuminate\Http\Response
   */
  public function destroy(Song $song)
  {
    //
  }

  private function setDuration($duration)
  {
    $hour = floor($duration / 3600);
    $min = floor(($duration - ($hour * 3600)) / 60);
    $sec = floor($duration % 60);

    $hour = ($hour < 1) ? "" : $hour . ":";
    $min = ($min < 10) ? "0" . $min . ":" : $min . ":";
    $sec = ($sec < 10) ? "0" . $sec : $sec;

    $duration = $hour . $min . $sec;
    dd($duration);
  }
}
