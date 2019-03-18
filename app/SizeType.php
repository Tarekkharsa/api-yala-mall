<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    public function size(){
        return $this->hasMany(Size::class);
    }
    public function pCategory(){
        return $this->belongsTo(Pcategory::class);
     }
}
