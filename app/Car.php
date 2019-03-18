<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function drivers(){
    	return $this->hasMany(Driver::class);
    }
}
