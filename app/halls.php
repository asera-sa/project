<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class halls extends Model
{
    public function reservation()
    {
        return $this->hasMany(reservation::class);
    } 


    public function services()
    {
        return $this->belongsToMany(services::class)->withPivot('price');
    } 

    public function user()
    {
        return $this->hasMany(user::class);
    } 

    public function occasions()
    {
        return $this->hasMany(occasions::class);
    } 
    public function city()
    {
        return $this->belongsTo(city::class);
    }  
}
