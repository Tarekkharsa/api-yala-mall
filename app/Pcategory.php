<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{
    public function products(){
        return $this->belongsTo(Product::class);
     }
     public function scategory(){
        return $this->belongsTo(Scategory::class);
     }

     public function sizeType(){
        return $this->hasMany(SizeType::class);
    }
}
