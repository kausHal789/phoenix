<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'img_url'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
