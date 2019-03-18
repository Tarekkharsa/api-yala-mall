<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function orders(){
    	return $this->hasMany(Order::class);
    }

}
