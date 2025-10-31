<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function trips() {
        return $this->belongsToMany(Trip::class);
    }
}
