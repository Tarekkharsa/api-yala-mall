<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Pcategory,
    Product};
class FilterController extends MyFunction
{

    
    /*
        This Function Filter v1.0
        Input:      key(required) , scategory_id, pcategory_id , size , count(optional)
        Output:     Get  From database | Return Products       
    */
    public function getFilter(Request $request)
    {  
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        // check key 
        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $scategory_id        = $this->checkParam($request->scategory_id);
        $pcategory_id        = $this->checkParam($request->pcategory_id);
        $size                = $this->checkParam($request->size);
        $count               = $this->checkParam($request->count);


       


        if($scategory_id      == '')      $scategory_id         = 0;
        if($pcategory_id     == '')      $pcategory_id        = 0;
        if($size     == '')      $size        = 0;
        if($count       == '')      $count          = 0;





        if ($scategory_id != 0 && $pcategory_id == 0  && $size  == 0){

            $ProductByCategory = Product::whereHas('shop.shopCategory', function ($query) use($scategory_id) {
                                                    $query->where('scategory_id',$scategory_id);
                                                })->get();
            return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByCategory] , 200);
    

        } else if ($pcategory_id != 0  && $size  == 0 ){
            
         
            $ProductByCategory = Product::whereHas('pCategory_size', function ($query) use($pcategory_id) {
                $query->where('pcategory_id',$pcategory_id);
            })->get();                                                
            return response()->json(['status' => 'success' , 'message' => 'OKff', 'data' => $ProductByCategory] , 200);

        } else if ( $pcategory_id != 0  && $size  != 0 ){

           $ProductByCategory = Product::whereHas('pCategory_size', function ($query) use($pcategory_id,$size) {
                                                $query->where('pcategory_id',$pcategory_id)
                                                    ->where('size_id',$size);
                                            })->get();
           return response()->json(['status' => 'success' , 'message' => 'OKff', 'data' => $ProductByCategory] , 200);
        }
 

    }


}
