<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dedicate extends Model
{
    protected $fillable = ['song_id', 'to_id', 'from_id'];
}
