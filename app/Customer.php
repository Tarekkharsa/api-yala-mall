<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function locations(){
        return $this->belongsToMany('App\Location' , 'customer_locations' , 'customer_id' , 'location_id')->withPivot('address');
    }

    public function addresses(){
    	return $this->hasMany(CustomerLocation::class);
    } 

    public function orders(){
    	return $this->hasMany(Order::class);
    }
}
