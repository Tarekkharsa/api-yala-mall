<?php

namespace App\Http\Controllers;
use App\{Mall,
    Scategory,
    Shop,
    Offer,
    Slider};
use Illuminate\Http\Request;
use  DateTime;
use App\Cobon;
use Carbon\Carbon;
class MallController extends MyFunction
{


         /*
        This Function getSliders v1.0
        Input:  key(required)        
        Output: Return all sliders 
    */
    public function getSliders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $sliders =Slider::all();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $sliders] , 200);    
    }

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

        foreach ($malls as  $mall) {
            $timestamp = Carbon::now();
            $now   = Carbon::parse( date(" H:i:s", strtotime( $timestamp)));
            $begin = Carbon::parse($mall->open_time);
            $end   = Carbon::parse($mall->close_time);
            
            //d(Carbon::parse($now)->greaterThanOrEqualTo($end));
            if ($now >= $begin && $now <= $end){
                $mall->state = 1;
                $mall->save();
            }else {
                $mall->state = 0;
                $mall->save();
            }
            
        }

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
        Input:  key(required)        , mall_id(required)      
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
   




    /*
        This Function getOfferByShop v1.0
        Input:  key(required)   ,shop_id(required)  
        Output: Return  shop offers  
    */
    public function getOfferByMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $mall_id =  $this->checkParam($request->mall_id);
        $shopAllId = Shop::where('mall_id', $mall_id)->get();




        $offers =  Mall::where('id',$mall_id)->with('shop.offers')->whereHas('shop.offers', function ($query)  {
            $query->where('active','1');
        })->get();
        

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offers] , 200);

    }





}
