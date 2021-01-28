<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    public function halls()
    {
        return $this->belongsTo(halls::class);
    }  
    public function services()
    {
        return $this->belongsToMany(services::class)->withPivot('quantity','price');
    } 

    public function customer()
    {
        return $this->belongsTo(customer::class);
    }


    public function occasions()
    {
        return $this->belongsTo(occasions::class);
    } 
}
