<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    public function comments()
    {
        return $this->hasMany('\App\Comment');
    }
    public function reports()
    {
        return $this->hasMany('\App\Report');
    }
}
