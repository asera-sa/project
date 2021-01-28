<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
    public function halls()
    {
        return $this->hasMany(halls::class);
    }
}
