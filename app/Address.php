<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{   
    public function halls()
    {
        // modal , local id, foriegn key
        return $this->hasMany(halls::class, 'id', 'Address_id');
    }
}
