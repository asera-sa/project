<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{

    // public function halls()
    // {
    //     return $this->belongsToMany(halls::class)->withPivot('price');
    // } 

    public function halls()
    {
        return $this->belongsTo(halls::class);
    } 
    public function reservation()
    {
        return $this->belongsToMany(reservation::class)->withPivot('quantity','price');
    }

}
