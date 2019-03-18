<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function sizeType(){
        return $this->belongsTo(SizeType::class);
     }
}
