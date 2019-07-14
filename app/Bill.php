<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function orders(){
        return $this->belongsTo(Order::class,'order_id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class);
    }

    public function bill_products(){
    	return $this->hasMany(BillProduct::class,'bill_id');
    }
}
