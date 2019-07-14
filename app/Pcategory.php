<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcategory extends Model
{

     public function scategory(){
        return $this->belongsTo(Scategory::class);
     }

     public function pcategory_size(){
        return $this->hasMany(SizeType::class);
    }

    public function sizes(){
      return $this->belongsToMany(Size::class , 'size_pcategories' , 'size_id' , 'pcategory_id');
  }
}
