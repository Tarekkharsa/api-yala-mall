<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public function scatecory(){
        return $this->belongsTo(Scategory::class,'shop_status_id');
    }
    public function shop(){
        return $this->belongsTo(Shop::class,'shop_status_id');
    }
}
