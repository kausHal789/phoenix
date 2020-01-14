<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use SoftDeletes;

    protected $fillable = ['title', 'description', ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
