<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    public function jobs()
    {
        return $this->belongsTo(jobs::class);
    }  
}
