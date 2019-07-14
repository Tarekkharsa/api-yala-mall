<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyFunction;
use App\{Mall,
    Scategory,
    Shop,
    Offer,
    Owner,
    Size,
    Pcategory,
    Product};

    use Illuminate\Support\Facades\Hash;
class OwnerController extends MyFunction
{
   

    
    public function login(Request $request){
     
        if(!$this->requiredParams($request, ['username' , 'password'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        
        
        $owner = Owner::where('username' , $this->checkParam($request->username))->first();
        
        if(!empty($owner))
        {

            if (Hash::check($this->checkParam($request->password), $owner->password))
            { 
                
                return response()->json(['status' => 'success' , 'message' => 'OK' , 'data' => $owner] , 200);
            }
            return response()->json(['status' => 'error' , 'message' => 'invaild password'] , 400);

        } else {
            return response()->json(['status' => 'error' , 'message' => 'invalid data'] , 400);
        }
    }
   

     /*
        This Function getOffers v1.0
        Input:  
        Output:   
    */
    public function getOffers(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $owner  = Owner::where('token' , $this->checkParam($request->token))->first();
        if (empty($owner)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.customer-is-not-exist') ] , 400);
        }
        
        $owner_id =  $owner->id;

        $offers = Offer::with('shops')->whereHas('shops', function ($query) use($owner_id) {
            $query->where('owner_id',$owner_id);
        })->get();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offers] , 200);

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
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

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
        This Function changeOfferStatus v1.0
        Input:  'key'(required),'offer_id'(required) , 'state'(required)
        Output: return Offer object
    */
    public function changeOfferStatus(Request $request){
        // return  $request;
        // check params 
        if(!$this->requiredParams($request, ['key','offer_id','status'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


    
        $id = $this->checkParam($request->offer_id);
        $offer = Offer::where('id', $id )->first();
        $offer->active = (int)$this->checkParam($request->status) ;
        $offer->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offer] , 200);    
    }



     /*
        This Function changeShopStatus v1.0
        Input:  'key'(required),'id'(required) , 'status'(required)
        Output: return Shop object
    */
    public function changeShopStatus(Request $request){
        // return  $request;
        // check params 
        if(!$this->requiredParams($request, ['key','id','status'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $shop = Shop::where('id', $id)->first();
        $shop->shop_status_id = (int)$this->checkParam($request->status) ;
        $shop->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);    
    }



    
     /*
        This Function getProductByOwner v1.0
        Input:  key(required) , token(required)      
        Output: Return  owner  Product 
    */
    public function getProductByOwner(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $owner  = Owner::where('token' , $this->checkParam($request->token))->first();
        if (empty($owner)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.customer-is-not-exist') ] , 400);
        }
        
        $owner_id =  $owner->id;


        $ProductByOwner = Product::with('gallery')->with('shop.mall')->whereHas('shop', function ($query) use($owner_id) {
            $query->where('owner_id',$owner_id);
        })->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ProductByOwner] , 200);

    }




     /*
        This Function getProductDetails  v1.0
        Input:  key(required)  , id(required)
        Output: get  product Details
    */
    public function getProductDetails(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $owner  = Owner::where('token' , $this->checkParam($request->token))->first();
        if (empty($owner)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.customer-is-not-exist') ] , 400);
        }
        $owner_id =  $owner->id;
        
        $product = Product::with('sizes')->with('shop')->where('id',$this->checkParam($request->id))->whereHas('shop', function ($query) use($owner_id) {
            $query->where('owner_id',$owner_id);
        })->first();
        
        if(empty($product)){
            return response()->json(['status' => 'success' , 'message' => 'not auth'] , 200);
        }
        
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $product] , 200);

    }



         /*
        This Function getOwnerOrders v1.0
        Input:  
        Output:   
    */
    public function getOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $owner  = Owner::where('token' , $this->checkParam($request->token))->first();
        if (empty($owner)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.customer-is-not-exist') ] , 400);
        }
        
        $owner_id =  $owner->id;

        $orders = Shop::with('bills.orders.status')->with('bills.billProduct')->where('owner_id', $owner_id)->get();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);

    }




}
