<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
    protected $table = 'size_pcategories';

    public function size(){
        return $this->belongsTo(Size::class,'size_id');
    }


    public function product(){
        return $this->hasMany(Product::class);
    }

    public function pCategory(){
        return $this->belongsTo(Pcategory::class,'pcategory_id');
     }
}
