<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public function scatecory(){
        return $this->belongsTo(Scategory::class,'scategory_id');
    }
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
