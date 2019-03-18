<?php

namespace App\Http\Controllers;
use App\Shop;
use App\{
    Scategory,
    offer};
use Illuminate\Http\Request;

class ShopController extends MyFunction
{
 
   /*
        This Function getShops v1.0
        Input:  key 
        Output: Return all Shop
    */
    public function getShops(Request $request){

        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $shop = Shop::all();

        if($shop == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'shop is not exist' ] , 400);
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);        
    }


       /*
        This Function getShop v1.0
        Input:  key , id
        Output: Return all info of shop
    */
    public function getShop(Request $request){

        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

      
        //$shop = Shop::find($request->id);
        $shop = Shop::with('owner')
        ->with('shopStatus')
        ->with('mall')
        ->with('offers')
        ->with('orders')
        ->with('scategories')
        ->with('products')
        ->where('id' , $request->id)
        ->first();

        if($shop == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'shop is not exist' ] , 400);
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);        
    }





    
    /*
        This Function getShopCategories v1.0
        Input:  key  
        Output: Return all shop categories with shop object only
    */
    public function getShopCategories(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $shop_categories = Scategory::with('shops')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop_categories] , 200);

    }

        /*
        This Function getOffers v1.0
        Input:  key  
        Output: Return all shop offers with shop 
    */
    public function getOffers(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $offers = Offer::with('shops')->where('active','1')->orderBy('created_at', 'DESC')->take(5)->get();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offers] , 200);

    }


    

     /*
        This Function getCategories v1.0
        Input:  key  
        Output: Return all Categories
    */
    public function getCategories(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $categories = Scategory::all();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $categories] , 200);

    }

    

    

}
