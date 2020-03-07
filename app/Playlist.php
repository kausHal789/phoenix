<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'name', 'img_url'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function songs() {
        return $this->belongsToMany(Song::class)->withTimestamps();
    }
}
