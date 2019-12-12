<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    public function report()
    {
        return $this->belongsTo('\App\Service');
    }
}
