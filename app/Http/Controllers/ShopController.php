<?php

namespace App\Http\Controllers;
use App\Shop;
use App\{
    Scategory,
    Offer,
    Mall};
use Illuminate\Http\Request;

class ShopController extends MyFunction
{
 
   /*
        This Function getShops v1.0
        Input:  key(required) 
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
        Input:  key(required)  , id(required) 
        Output: Return shop with owner with(shopStatus,mall,offers,orders,scategories,products)
    */
    public function getShop(Request $request){

        // check params 
        if(!$this->requiredParams($request, ['key', 'id'])){
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
        Input:  key(required)   , shop_id(required)   
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

        $shop_id = $this->checkParam($request->shop_id);

        $shop_categories = Scategory::with('shopCategory.shop')->whereHas('shopCategory', function ($query) use($shop_id) {
                                                    $query->where('shop_id',$shop_id);
                                                })->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop_categories] , 200);

    }


        /*
        This Function getOffers v1.0
        Input:  key(required)    
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
        Input:  key(required)      
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


      /*
        This Function getCategoryByMall v1.0
        Input:  key(required)      
        Output: Return all Categories by mall
    */
    public function getCategoryByMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $mall = Mall::with('shop.scategories')->where('id',$request->mall_id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $mall] , 200);

    }

    

        /*
        This Function getShopByMall v1.0
        Input:  key(required)  , mall_id(required)
        Output: Return all shops by mall where mall_id == request -> mall_id
    */
    public function getShopByMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $mall = Mall::with('shop.shopStatus')->where('id',$request->mall_id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $mall] , 200);

    }

    


    

    

}
