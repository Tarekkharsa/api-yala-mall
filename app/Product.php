<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function billProduts(){
    	return $this->hasMany(BillProduct::class);
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function gallery(){
        return $this->hasMany(Gallery::class);
    }

    public function tagProduct(){
        return $this->hasMany(TagProduct::class);
    }
    public function pCategory_size(){
        return $this->belongsTo(SizeType::class,'size_pcategory_id');
     }
  
    public function sizes(){
        return $this->belongsToMany('App\Size' , 'product_size' , 'product_id' , 'size_id');
    }
    public function productsize(){
        return $this->hasMany(ProductSize::class);
    }

    public function pCategory(){
        return $this->belongsTo(Pcategory::class,'pcategory_id');
     }
}
