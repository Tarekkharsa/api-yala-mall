<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    public function shop(){
    	return $this->hasMany(Shop::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
