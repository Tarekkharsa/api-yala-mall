<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tagProduct(){
    	return $this->hasMany(TagProduct::class);
    }
}
