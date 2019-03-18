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
    public function pCategory(){
        return $this->belongsTo(Pcategory::class);
     }
     public function products(){
        return $this->hasMany(Product::class);
    }
}
