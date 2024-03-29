<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
//    public function orders(){
//         return $this->belongsToMany('App\Order' , 'bills' , 'shop_id' , 'order_id');
//     }
    

    public function sCategory(){
        return $this->belongsToMany('App\Scategory' , 'shop_categories' , 'scategory_id');
    }
    public function shopCategory(){
        return $this->hasMany(ShopCategory::class);
    }
    
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function bills(){
        return $this->hasMany(Bill::class);
    }

    public function shopStatus(){
        return $this->belongsTo(ShopStatus::class,'shop_status_id');
    }

    public function offers(){
    	return $this->hasMany(Offer::class);
    }
    public function scategories(){
        return $this->belongsToMany('App\Scategory' , 'shop_categories' , 'shop_id' , 'scategory_id');
    }
    public function orders(){
        return $this->belongsToMany('App\Order' , 'bills' , 'shop_id' , 'order_id');
    }
    public function owner(){
        return $this->belongsTo(Owner::class , 'owner_id');
     }

     public function mall(){
        return $this->belongsTo(Mall::class,'mall_id');
    }

 
}
