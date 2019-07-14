<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
 protected $table = 'product_size';   
 public $timestamps = false;

 public function product(){
    return $this->belongsTo(Product::class,'product_id');
}
public function sizes(){
    return $this->belongsTo(Size::class,'size_id');
}


}
