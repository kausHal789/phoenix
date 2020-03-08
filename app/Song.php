<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'source', 'writer', 'producer', 'category_id', 'song_url', 'duration', 'listener'];

    public function album() {
        return $this->belongsTo(Album::class);
    }

    public function playlist() {
        return $this->belongsToMany(Playlist::class)->withTimestamps();
    }
}
