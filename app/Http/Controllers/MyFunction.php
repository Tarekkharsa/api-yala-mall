<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Mall,
    Gallery};
    use Intervention\Image\ImageManagerStatic as Image;
class MyFunction extends Controller
{
    const KEY = "1";



    public function requiredParams(Request $request , $params)
    {
        foreach ($params as $param) {
            if(!isset($request[$param]))
            {
                return FALSE;
            }
        }

        return TRUE;
    }


    public function checkParam($param)
    {
        if(!isset($param) || $param == NULL)
        {
            return NULL;
        } 

        if (is_array($param)) {
            $newArray = array_map(function($v){
                return trim(strip_tags($v));
            }, $param);
            return $newArray;
        }
        $param = strip_tags($param);
        return $param;
    }


    /*
        This Function verifyPhone v1.0
        Input: phone 
        Output: TRUE OR FALSE
        Description: 1. check if phone not equal 10 character
                     2. check if first charcter phone   not equal '09'
                     3. check if all digit phone is number 
    */
    public function verifyPhone($phone) {
        if ($phone == NULL) {
            return FALSE;
        }

        if (strlen($phone) != 10) {
            return FALSE;
        }

        if (substr($phone, 0, 2) != '09') {
            return FALSE;
        }

        $sz = strlen($phone); 
        for($i = 0; $i < $sz; $i++) {
            if ($phone[$i] < '0' || $phone[$i] > '9') {
                return FALSE;
            }
        }
        return TRUE;

    }
    public function verifyPassword($password) {
        if ($password == NULL) {
            return FALSE;
        }

        if (strlen($password) < 8) {
            return FALSE;
        }



        return TRUE;

    }
    public function randoomString($length) {
        $result = '';
        for($i = 0; $i < $length; $i++) {
            $result .= chr(rand(0, 25) + 97);
        }
        return $result;
    }



    public function getMallId($id){
 
        // check if customers exists
        $mall = Mall::whereHas('shop.products', function ($query)  use ($id){
            $query->where('id',$id);
        })->first(['id']);
         $mall_id =  $mall->id;
        return $mall_id;
    }

    
    public function getMallIdByShop($id){
 
        // check if customers exists
        $mall = Mall::whereHas('shop', function ($query)  use ($id){
            $query->where('id',$id);
        })->first(['id']);
         $mall_id =  $mall->id;
        return $mall_id;
    }


    public function addGallary($img,$product_id){

        $gallries = new Gallery;
        $gallries->product_id = $product_id;
        if (File($img)) {
            $image = file($img);
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $gallries->image = $input['imagename'];
        }
        $gallries->save();
    }






    public function image($name){
       
        $storagePath = public_path('upload/'.$name);
        
        if (!file_exists('upload/'.$name)) {
            return 'OOOOOps';
        }
       return Image::make($storagePath)->response();
   }
}
