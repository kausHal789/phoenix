<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'image'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
