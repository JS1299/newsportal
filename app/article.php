<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    public function comments()
    {
        return $this->hasMany('App\comment');
    }
}