<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function status(){
        return $this->belongsTo(OrderStatus::class,'order_status_id');
    }

     public function driver(){
        return $this->belongsTo(Driver::class);
    }

     public function address(){
      return $this->belongsTo(CustomerLocation::class);
    }

     
     public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function bills(){
    	return $this->hasMany(Bill::class);
    }


    public function shop(){
        return $this->belongsToMany('App\Shop' , 'bills' , 'order_id' , 'shop_id');
    }

}
