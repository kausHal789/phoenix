<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MakeArtistRequest extends Model
{
    use SoftDeletes;

    protected $fillable = ['url'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
