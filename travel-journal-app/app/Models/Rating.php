<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    //Collegamento con Trips
    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
