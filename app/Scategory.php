<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scategory extends Model
{
    public function shops(){
        return $this->belongsToMany('App\Shop' , 'shop_categories' , 'scategory_id' , 'shop_id');
    }

}
