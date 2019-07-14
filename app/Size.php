<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function pcategory_size(){
        return $this->hasMany(SizeType::class);
     }


     public function products(){
        return $this->belongsToMany(Product::class , 'product_size' , 'size_id' , 'product_id');
    }


    public function pcategory(){
        return $this->belongsToMany(Pcategory::class , 'size_pcategories' , 'size_id' , 'pcategory_id');
    }

    public function productsize(){
        return $this->hasMany(ProductSize::class);
    }
}
