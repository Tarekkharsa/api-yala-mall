<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagProduct extends Model
{
    public function tags(){
        return $this->belongsTo(Tag::class);
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }
}
