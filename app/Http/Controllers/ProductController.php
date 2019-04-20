<?php

namespace App\Http\Controllers;
use App\Shop;
use App\{
    Scategory,
    offer,
    Mall,
    Product,
    Pcategory,
    Size};
use Illuminate\Http\Request;

class ProductController extends MyFunction
{
 
    
    /*
        This Function getProductByCategory v1.0
        Input:  key(required)     , id(required)   
        Output: Return  sCategory  with shop with Products
    */
    public function getProductByCategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);
        $ProductByCategory = Product::with('gallery')->whereHas('shop.shopCategory.scatecory', function ($query) use($id) {
            $query->where('id',$id);
        })->get();

        // $ProductByCategory = Scategory::with('shops.products')->where('id',$request->id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByCategory] , 200);

    }


     /*
        This Function getProductByshop v1.0
        Input:  key(required) , id(required)      
        Output: Return   shop with Product where id = request->>id
    */
    public function getProductByshop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

      


        $ProductByshop = Product::with('gallery')->where('shop_id',$request->id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByshop] , 200);

    }


     /*
        This Function getProductByMAll v1.0
        Input:  key(required)  ,mall_id(required)
        Output: Return mall with shop with Product
    */
    public function getProductByMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $mall_id = $this->checkParam($request->mall_id);
         $ProductByMAll = Product::with('gallery')->whereHas('shop.mall', function ($query) use($mall_id) {
            $query->where('id',$mall_id);
        })->get();

        // $ProductByMAll = Mall::with('Shop.products')->where('id', $request->mall_id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByMAll] , 200);

    }




     /*
        This Function getProducts v1.0
        Input:  key(required)  
        Output: Return all Products with gallery
    */
    public function getProducts(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $Products = Product::with('gallery')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Products] , 200);

    }



    /*
        This Function get Product Details v1.0
        Input:  key(required)   , id(required)
        Output: get Product by id
    */
    public function getProductDetails(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $productDetails = Product::with('gallery')->where('id',$request->id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $productDetails] , 200);

    }

    
    /*
        This Function get Pcategory  v1.0
        Input:  key  
        Output: get all Pcategory
    */
    public function getPcategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $Pcategory = Pcategory::all();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }


        /*
        This Function getSizeByPcategory  v1.0
        Input:  key(required)  , id(required)
        Output: get  Size by pcategory | return pcatecory with sizes 
    */
    public function getSizeByPcategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $pcategory_id=$this->checkParam($request->id);
        $Pcategory = Size::whereHas('pcategory_size', function ($query) use($pcategory_id) {
                                                    $query->where('pcategory_id',$pcategory_id);
                                                })->get();
        return response()->json(['status' => 'success' , 'message' => 'OK111', 'data' => $Pcategory] , 200);

    }



     
     
    /*
        This Function getPcategoryByScategory  v1.0
        Input: id(required), key(required)  
        Output: get all pcategory by scategory
    */
    public function getPcategoryByScategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $Pcategory = scategory::with('pCategory')->where('id',$request->id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }




        /*
        This Function search  v1.0
        Input: name(required), key(required)  
        Output: search in product by name
    */
    public function search(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $Pcategory = Product::with('gallery')->where('name','like','%'.$request->name.'%')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }

            /*
        This Function searchByShop  v1.0
        Input: name(required), key(required)  , shop_id(required) 
        Output: search  product in shop by name
    */
    public function searchByShop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','shop_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $Pcategory = Product::with('gallery')->where('name','like','%'.$request->name.'%')->where('shop_id',$request->shop_id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }


               /*
        This Function searchByMall  v1.0
        Input: name(required), key(required)  , mall_id(required) 
        Output: search  product in mall by name
    */
    public function searchByMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $mall_id = $this->checkParam($request->mall_id);

        $Pcategory = Product::with('gallery')->where('name','like','%'.$request->name.'%')->whereHas('shop.mall', function ($query) use($mall_id) {
            $query->where('id',$mall_id);
        })->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }

                 /*
        This Function searchByScategory  v1.0
        Input: name(required), key(required)  , cat_id(required) 
        Output: search  product in Scategory by name
    */
    public function searchByScategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','cat_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $cat_id = $this->checkParam($request->cat_id);

        $scategory = Product::with('gallery')->where('name','like','%'.$request->name.'%')->whereHas('shop.shopCategory.scatecory', function ($query) use($cat_id) {
            $query->where('id',$cat_id);
        })->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $scategory] , 200);

    }

    
    /*
        This Function getScategoryById v1.0
        Input:  key(required)  , cat_id(required)      
        Output: Return Scategory(object) 
    */
    public function getScategoryById(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key', 'cat_id'])){
           return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
       }

       $key = $this->checkParam($request->key);
       if ($key !== self::KEY) {
           return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
       }


       $cat_id = $this->checkParam($request->cat_id);
      
      $catInfo = Scategory::where('id',$cat_id)->get();
      
       return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $catInfo] , 200);   
   }
}
