<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
        "image", "latitude", "longtitude", "time",
        "desa", "kecamatan", "user_id"
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
