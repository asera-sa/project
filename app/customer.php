<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }  
    
}
