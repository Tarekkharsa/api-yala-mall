<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopStatus extends Model
{
    public function shop(){
        return $this->hasMany(Shop::class);
    }
}
