<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeProduct extends Model
{
    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
