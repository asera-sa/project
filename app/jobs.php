<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    public function employees()
    {
        return $this->hasMany(employees::class);
    }
}
