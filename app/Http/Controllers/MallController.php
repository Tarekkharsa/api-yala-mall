<?php

namespace App\Http\Controllers;
use App\{Mall,
    Scategory};
use Illuminate\Http\Request;

class MallController extends MyFunction
{
     /*
        This Function getMalls v1.0
        Input:  key(required)        
        Output: Return all Malls with location
    */
    public function getMalls(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $malls =Mall::with('location')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }


/*
        This Function scategoryByMall v1.0
        Input:  key(required)        , id(required)      
        Output: Return Scategory By  Mall 
    */
    public function scategoryByMall(Request $request){
         // check params 
         if(!$this->requiredParams($request, ['key', 'id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $mall_id = $this->checkParam($request->id);
       
        $scategoryByMall = Scategory::whereHas('shopCategory.shop.mall', function ($query) use($mall_id) {
            $query->where('id',$mall_id);
        })->get();


        


        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $scategoryByMall] , 200);   
    }


    /*
        This Function getMallById v1.0
        Input:  key(required)        , id(required)      
        Output: Return mall(object) 
    */
    public function getMallById(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key', 'mall_id'])){
           return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
       }

       $key = $this->checkParam($request->key);
       if ($key !== self::KEY) {
           return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
       }


       $mall_id = $this->checkParam($request->mall_id);
      
      $mallInfo = Mall::where('id',$mall_id)->get();
      
       return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $mallInfo] , 200);   
   }
   
}
