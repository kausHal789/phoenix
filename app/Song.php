<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'source', 'writer', 'producer', 'category_id', 'image_url', 'song_url', 'duration', 'description', 'played_count'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
