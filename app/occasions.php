<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class occasions extends Model
{

    public function halls()
    {
        return $this->belongsTo(halls::class);
    }  

    public function reservation()
    {
        return $this->hasOne(reservation::class);
    }  

}
