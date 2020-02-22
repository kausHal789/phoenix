<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Requests\StoreSongPost;
use App\Song;
use App\SongCategory;
use FFMpeg\FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class SongController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function __construct()
  {
    $this->ffmpegPath = realpath('C:/FFmpeg/bin/ffmpeg.exe');
    $this->ffprobePath = realpath("C:/FFmpeg/bin/ffprobe.exe");
  }

  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create($album_id)
  {
    $album = Album::findOrFail($album_id);
    $categories = SongCategory::select('id', 'name')->get();
    $isSongUploadPage = true;
    return view('song.create', compact('categories', 'album', 'isSongUploadPage'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  // use Filesystems;

  public function store(StoreSongPost $request)
  {
    // Validation done in StoreSongPost. 
    // dd($request);
    $album_id = request()->album_id;
    $album = Album::findOrFail($album_id);
    // dd($album);

    $audioPath = $request['audio']->store('audio', 'public');
    $audioPath = public_path("storage/$audioPath");
    $finalPath = storage_path() . '/app/public/audio/' . time() . uniqid() . '.mp3';

    $cmd = "$this->ffmpegPath -i $audioPath $finalPath 2>&1";

    exec($cmd, $outputLog, $returnCode);
    if ($returnCode != 0) {
      foreach ($outputLog as $line) {
        echo $line . "<br>";
      }
      // dd('not done');
      return false;
    }
    unlink($audioPath);
    // It was also right
    // Storage::delete($audioPath);

    $data = explode('/', $finalPath);
    $audioFinalPath = $data[3] . '/' . $data[4];

    $FFMpeg = FFMpeg::create([
      'ffmpeg.binaries'  => 'C:/FFmpeg/bin/ffmpeg.exe',
      'ffprobe.binaries' => 'C:/FFmpeg/bin/ffprobe.exe'
    ]);
    $ffprobe = $FFMpeg->getFFProbe();

    $duration = $this->setDuration($ffprobe->format($request->file('audio'))->get('duration'));

    if($request['image']) {
      $imagePath = $request['image']->store('image', 'public');
      $image = Image::make(public_path("storage/$imagePath"))->resize(1000, 1000);
      $image->save();
    }

    $album->song()->create([
      'title' => $request['title'],
      'source' => $request['source'],
      'writer' => $request['writer'],
      'producer' => $request['producer'],
      'description' => $request['description'],
      'category_id' => $request['category'],
      'image_url' => $imagePath,
      'song_url' => $audioFinalPath,
      'duration' => $duration,
    ]);

    // redirect
    return redirect("/artist/song/$album_id");
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
    return $duration;
  }
}
