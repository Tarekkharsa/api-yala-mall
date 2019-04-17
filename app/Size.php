<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function pcategory_size(){
        return $this->hasMany(SizeType::class);
     }
}
