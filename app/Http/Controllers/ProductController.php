<?php

namespace App\Http\Controllers;
use App\Shop;
use App\{
    Scategory,
    offer,
    Mall,
    Product};
use Illuminate\Http\Request;

class ProductController extends MyFunction
{
 
    
    /*
        This Function getProductByCategory v1.0
        Input:  key  
        Output: Return all Category  with shop with Product
    */
    public function getProductByCategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $ProductByCategory = Scategory::with('shops.products')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByCategory] , 200);

    }


          /*
        This Function getProductByshop v1.0
        Input:  key  
        Output: Return all  shop with Product
    */
    public function getProductByshop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $ProductByshop = Shop::with('products')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByshop] , 200);

    }


       /*
        This Function getProductByMAll v1.0
        Input:  key  
        Output: Return mall with Product
    */
    public function getProductByMAll(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','mall_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $ProductByMAll = Mall::with('Shop.products')->where('id', $request->mall_id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByMAll] , 200);

    }




         /*
        This Function getProducts v1.0
        Input:  key  
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



}
