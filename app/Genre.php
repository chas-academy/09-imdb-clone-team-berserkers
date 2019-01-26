<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    public function series()
    {
        return $this->belongsToMany(Series::class);
    }
}
