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
        return $this->hasMany(services::class);
    }  

    public function user()
    {
        return $this->hasMany(user::class);
    } 

    public function occasions()
    {
        return $this->hasMany(occasions::class);
    } 
    
    public function Address()
    {
        // modal, foreign key
        return $this->belongsTo(Address::class, 'Address_id');
    }  
}
