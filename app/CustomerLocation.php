<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerLocation extends Model
{
    
    public function location(){
        return $this->belongsTo(Location::class);
    }

     public function customer(){
        return $this->belongsTo(Customer::class);
    } 
    public function order(){
    	return $this->hasMany(Order::class);
    }
}
