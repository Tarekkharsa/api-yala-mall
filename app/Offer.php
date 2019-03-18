<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function shops(){
        return $this->belongsTo(Shop::class,'shop_id');
    }
}
