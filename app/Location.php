<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function address(){
    	return $this->hasMany(CustomerLocation::class);
    } 
    public function malls(){
        return $this->hasMany(Mall::class);
    }
}
