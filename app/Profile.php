<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'image', 'cover_image'];

    public function profileImage() {
        $imagepath = ($this->image) ? $this->image : 'icons/default_profile.png';

        return '/storage/' . $imagepath;
    }

    public function converImg() {
        $bgpath = ($this->cover_image) ? $this->cover_image : 'icons/bg.jpg';
        return '/storage/' . $bgpath;
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
