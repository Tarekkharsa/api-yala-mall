<?php

namespace App\Http\Controllers\SupportDashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyFunction;
use Validator;
use App\{
    Order,
    offer,
    Customer,
    Owner,
     Product,
     Shop,
    Bill,BillProduct,
    Mall,
    Scategory,
    ShopStatus};

    use App\Cobon;
use Carbon\Carbon;
class Shopcontroller extends MyFunction
{


      /*
        This Function addOwner v1.0
        Input:  'key','full_name','username','password','phone','token'    
        Output: return owner object
    */
    public function addOwner(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','full_name','username','password','phone'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $phone = $this->checkParam($request->phone);
        if(!$this->verifyPhone($phone)) {
            return response()->json(['status' => 'error' , 'message' => __('errors.phone-not-valid') ] , 400);
        }

        $username = $this->checkParam($request->username);
        $owners = Owner::where('username' , $username)->first();
        if (!empty($owners)) {
        	return response()->json(['status' => 'error' , 'message' =>  __('errors.username-taken') ] , 400);
        }

        $owner = new Owner;
        $owner->full_name = $this->checkParam($request->full_name);
        $owner->username = $this->checkParam($request->username);
        $owner->password = bcrypt ($this->checkParam($request->password));
        $owner->phone = $this->checkParam($request->phone);
        $owner->token = $this->randoomString(32);
        $owner->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $owner] , 200);    
    }


          /*
        This Function updateOwner v1.0
        Input:  'key','id
        Output: return owner object
    */
    public function updateOwner(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','owner_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->owner_id);

        if (isset($request->phone)) {
            $phone = $this->checkParam($request->phone);
            if(!$this->verifyPhone($phone)) {
                return response()->json(['status' => 'error' , 'message' => __('errors.phone-not-valid') ] , 400);
            }
        }

        $username =  $request->username;
        if (isset($username)) {
        	$check_owner = Owner::where('username' , $username)->where('id' , '!=' , $id)->first();
        	if (!empty($check_owner)) {
        		return response()->json(['status' => 'error' , 'message' =>  __('errors.username-taken') ] , 400);
        	}
        	
        }
       

        $owner =  Owner::where('id', $id)->first();
        $owner->username = $username;
        if (isset($request->full_name)) {
            $owner->full_name = $this->checkParam($request->full_name);
        }
        if (isset($request->password)) {
            $owner->password = bcrypt ($this->checkParam($request->password));
        }
        if (isset($request->phone)) {
            $owner->phone = $this->checkParam($request->phone);
        }
  
        $owner->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $owner] , 200);    
    }



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

        $shop = Shop::with('mall.location.city')
                      ->get();

        if($shop == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'shop is not exist' ] , 400);
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);        
    }

           /*
        This Function getShop v1.0
        Input:  key(required) 
        Output: Return  Shop
    */
    public function getShop(Request $request){

        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);
        $shop = Shop::with('mall.location.city')->where('id',$id)->get();

        if($shop == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'shop is not exist' ] , 400);
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);        
    }




        /*
        This Function addShop v1.0
        Input:  key(required) ,name(required) , logo(required)  ,flour(required)  ,open_time(required)  ,close_time(required) 
        ,shop_status_id(required) ,sale(required) ,min_order_cost(required) ,mall_id(required) ,owner_id(required)
        Output: return  Shop object
    */
    public function addShop(Request $request){
        
       
        // check params 
        if(!$this->requiredParams($request, ['key','name','logo','open_time','close_time','shop_status_id','mall_id',])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $shopStatus = ShopStatus::where('id', $request->shop_status_id)->first();
        if ( $shopStatus == null) {
            return response()->json(['status' => 'error' , 'message' => 'shopStatus not found' ] , 400);
        }
   
        $shop_phone = $this->checkParam($request->shop_phone);
           // check shop phone
           if(!$this->verifyPhone($shop_phone)) {
            return response()->json(['status' => 'error' , 'message' => __('errors.shop_phone-not-valid') ] , 400);
        }


        $owner    = new Shopcontroller;
        $response = $owner->addOwner($request);

        // handle response
        $status =  $response->status();
        $contentResponse = $response->getContent();
        $contentResponse = json_decode($contentResponse);
        $message  = $contentResponse->message;

        if($status != 200){
        	// something wrong
        	return response()->json(['status' => 'error' , 'message' =>  $message ] , 400);
        }
    	$owner_id = $contentResponse->data->id;

        $shop = new Shop;
        $shop->name =$this->checkParam($request->name);
        if (isset($request->flour)) {
            $shop->flour =$this->checkParam($request->flour);
        }
        
        $shop->open_time =$this->checkParam($request->open_time);
        $shop->close_time =$this->checkParam($request->close_time);
        $shop->shop_status_id =$this->checkParam($request->shop_status_id);
        if (isset($request->sale)) {
            $shop->sale =$this->checkParam($request->sale);
        }
        if (isset($request->min_order_cost)) {
            $shop->min_order_cost =$this->checkParam($request->min_order_cost);
        }
        
        $shop->mall_id =$this->checkParam($request->mall_id);
        $shop->owner_id =$owner_id;

        if (isset($request->lat)) {
            $shop->lat =$this->checkParam($request->lat);
        }
        if (isset($request->lng)) {
            $shop->lng =$this->checkParam($request->lng);
        }
       if ($shop_phone) {
            $shop->shop_phone =$shop_phone;
       }

        if(isset($request->logo) && !empty($request->logo)){

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                $dest = public_path('/images');
                $image->move($dest, $input['imagename']);
                $shop->logo = $input['imagename'];
            }
        }

     


        $shop->save();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);    
    }




    /*
        This Function updateShop v1.0
        Input:     
        Output: return  Shop object
    */
    public function updateShop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);
        
        $shop = Shop::find($id);
        if (empty($shop)) {
        	return response()->json(['status' => 'error' , 'message' =>  __('errors.shop-not-exists') ] , 400);
        }



        $owner_id = $shop->owner_id;
        $request['owner_id'] = $owner_id;
        $owner    = new Shopcontroller;
        $response = $owner->updateOwner($request);

        // handle response
        $status =  $response->status();
        $contentResponse = $response->getContent();
        $contentResponse = json_decode($contentResponse);
        $message  = $contentResponse->message;

        if($status != 200){
        	// something wrong
        	return response()->json(['status' => 'error' , 'message' =>  $message ] , 400);
        }
        $shop_status_id = $request->shop_status_id;

        if (isset($request->shop_status_id)) {
            $shopStatus = ShopStatus::where('id', $request->shop_status_id)->first();
            if ( $shopStatus == null) {
                return response()->json(['status' => 'error' , 'message' => 'shopStatus not found' ] , 400);
            }
        }

        if (isset($request->shop_phone)) {
            $shop_phone = $this->checkParam($request->shop_phone);
            // check shop phone
            if(!$this->verifyPhone($shop_phone)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.shop_phone-not-valid') ] , 400);
            }
        }
       
        $shop = Shop::where('id', $id)->with('owner')->first();
        if (isset($request->name)) {
            $shop->name =$this->checkParam($request->name);
        }
        if (isset($request->flour)) {
            $shop->flour =$this->checkParam($request->flour);
        }
        if (isset($request->open_time)) {
            $shop->open_time =$this->checkParam($request->open_time);
        }
        if (isset($request->close_time)) {
            $shop->close_time =$this->checkParam($request->close_time);
        }
        if (isset($request->sale)) {
            $shop->sale =$this->checkParam($request->sale);
        }
         if (isset($request->min_order_cost)) {
            $shop->min_order_cost =$this->checkParam($request->min_order_cost);
         }
         if (isset($request->mall_id)) {
            $shop->mall_id =$this->checkParam($request->mall_id);
        }
        if (isset($shop_status_id)) {
            $shop->shop_status_id =$shop_status_id;
        }
      
        $shop->owner_id =$owner_id;
        
        if (isset($request->lat)) {
            $shop->lat =$this->checkParam($request->lat);
        }
        if (isset($request->lng)) {
            $shop->lng =$this->checkParam($request->lng);
        }
        if ($shop_phone) {
            $shop->shop_phone =$shop_phone;
       }
       
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $shop->logo = $input['imagename'];
        }


        $shop->save();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $shop] , 200);    
    }



    	/*
        This Function deleteShop v1.0
        Input:  key , id
        Output: Return "success"
        Description: Delete Shop from database 
    */
    public function deleteShop(Request $request){

    	$validator = Validator::make($request->all(), [
	        'id'     => 'required',
	        'key'    => 'required',
    	]);

	    if ($validator->fails()) {
	        return response()->json(['status' => 'error' , 'message' =>  $validator->errors() ] , 400);
	    }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' =>  __('errors.invalid-request') ] , 400);
        }

        $id = $this->checkParam($request->id);
        $shop = Shop::where('id' , $id)->first();
        if(empty($shop)){
        	return response()->json(['status' => 'error' , 'message' =>  __('errors.shop-not-exists') ] , 400);
        }

        
          $shop->owner()->delete();

        return response()->json(['status' => 'success' , 'message' => __('errors.shop-deleted-successfuly')] , 200);
    }


    //// product area  //////



    
}
