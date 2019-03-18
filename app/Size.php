<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function sizeProduct(){
    	return $this->hasMany(SizeProduct::class);
    }
}
