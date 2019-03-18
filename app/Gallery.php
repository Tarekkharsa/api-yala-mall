<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function products(){
        return $this->belongsTo(Product::class);
     }
}
