<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    //Collegamento con Rating
    public function rating() {
        return $this->belongsTo(Rating::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
