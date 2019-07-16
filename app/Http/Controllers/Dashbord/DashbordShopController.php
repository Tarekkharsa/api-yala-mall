<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\MyFunction;
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
    Pcategory,
    Size,
    SizeType};

use App\Cobon;
use Carbon\Carbon;
class DashbordShopController extends MyFunction
{
    







    

    /*
        This Function addShop v1.0
        Input:  key(required) ,name(required) , logo(required)  ,flour(required)  ,open_time(required)  ,close_time(required) 
        ,shop_status_id(required) ,sale(required) ,min_order_cost(required) ,mall_id(required) ,owner_id(required)
        Output: return  Shop object
    */
    public function addShop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','logo','flour','open_time','close_time','shop_status_id','sale','min_order_cost','mall_id','owner_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   

        $shop = new Shop;
        $shop->name =$this->checkParam($request->name);
        $shop->flour =$this->checkParam($request->flour);
        $shop->open_time =$this->checkParam($request->open_time);
        $shop->close_time =$this->checkParam($request->close_time);
        $shop->shop_status_id =$this->checkParam($request->shop_status_id);
        $shop->sale =$this->checkParam($request->sale);
        $shop->min_order_cost =$this->checkParam($request->min_order_cost);
        $shop->mall_id =$this->checkParam($request->mall_id);
        $shop->owner_id =$this->checkParam($request->owner_id);

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
        This Function updateShop v1.0
        Input:  key(required) ,id(required),name(required) , logo(required)  ,flour(required)  ,open_time(required)  ,close_time(required) 
        ,shop_status_id(required) ,sale(required) ,min_order_cost(required) ,mall_id(required) ,owner_id(required)       
        Output: return  Shop object
    */
    public function updateShop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','name','flour','open_time','close_time','shop_status_id','sale','min_order_cost','mall_id','owner_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   
        $id = $this->checkParam($request->id);
        $shop = Shop::where('id', $id)->first();
        $shop->name =$this->checkParam($request->name);
        $shop->flour =$this->checkParam($request->flour);
        $shop->open_time =$this->checkParam($request->open_time);
        $shop->close_time =$this->checkParam($request->close_time);
        $shop->shop_status_id =$this->checkParam($request->shop_status_id);
        $shop->sale =$this->checkParam($request->sale);
        $shop->min_order_cost =$this->checkParam($request->min_order_cost);
        $shop->mall_id =$this->checkParam($request->mall_id);
        $shop->owner_id =$this->checkParam($request->owner_id);

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
        Input:  key(required) , id(required)      
        Output: return message Deleted
    */
    public function deleteShop(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


       Shop::destroy($this->checkParam($request->id));

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'Deleted'] , 200);    
    }





    
    /*
        This Function addScategory v1.0
        Input:  key(required) ,name(required) , image(required)       
        Output: return Scategory object
    */
    public function addScategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','image'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $scategory = new Scategory;
        $scategory->name =$this->checkParam($request->name);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $scategory->image = $input['imagename'];
        }

        $scategory->save();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $scategory] , 200);    
    }


    /*
        This Function addPcategory v1.0
        Input:  key(required) ,name(required) ,scatogory_id(required)        
        Output: return Pcategory object
    */
    public function addPcategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','scatogory_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $pcategory = new Pcategory;
        $pcategory->name =$this->checkParam($request->name);
        $pcategory->scatogory_id =$this->checkParam($request->scatogory_id);
        $pcategory->save();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $pcategory] , 200);    
    }



    /*
        This Function addSize v1.0
        Input:  key(required) ,name(required)     
        Output: return Size object
    */
    public function addSize(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $size = new Size;
        $size->name =$this->checkParam($request->name);
        $size->save();



        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $size] , 200);    
    }


        /*
        This Function deleteSize v1.0
        Input:  key(required) , id
        Output: return Size object
    */
    public function deleteSize(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $size =  Size::where('id', $id)->delete();




        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'delete sucsses'] , 200);    
    }


        /*
        This Function deletePcategory v1.0
        Input:  key(required) , id
        Output: return Size object
    */
    public function deletePcategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $Pcategory =  Pcategory::where('id', $id)->delete();




        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'delete sucsses'] , 200);    
    }


           /*
        This Function deleteScategory v1.0
        Input:  key(required) , id
        Output: return Size object
    */
    public function deleteScategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $Scategory =  Scategory::where('id', $id)->delete();




        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'delete sucsses'] , 200);    
    }
    //////
//getShopOrders
//updateOrderStatus
//getCustomerOrders
//addOrder




    /*
        This Function getOrders v1.0
        Input:  key(required)        
        Output: return all Orders
    */
    public function getOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $orders = Order::with('bills')->with('status')->with('driver')->get();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);    
    }









    /*
        This Function getoffer v1.0
        Input:  key(required) ,id  (required)      
        Output: return offer object
    */
    public function getOffer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

       $offer =  Offer::where('id', $id)->get();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offer] , 200);    
    }



    
     /*
        This Function addOffer v1.0
        Input:  key(required),title(required) ,image(required) 
        ,description(required) ,price(required) ,shop_id(required)     
        Output: return Offer object
    */
    public function addOffer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','title','image','description','price','shop_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   

        $offer = new Offer;
        $offer->title = $this->checkParam($request->title);
        $offer->description = $this->checkParam($request->description);
        $offer->price = $this->checkParam($request->price);
        $offer->shop_id = $this->checkParam($request->shop_id);

       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $offer->image = $input['imagename'];
        }

        $offer->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offer] , 200);    
   



    }

    /*
        This Function addOffer v1.0
        Input:  key(required),id(required),title(required) ,image(required) 
        ,description(required) ,price(required) ,shop_id(required)          
        Output: return Offer object
    */
    public function updateOffer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','title','image','description','price','shop_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   
        $id = $this->checkParam($request->id);

        $offer =  Offer::where('id', $id)->first();
        $offer->title = $this->checkParam($request->title);
        $offer->description = $this->checkParam($request->description);
        $offer->price = $this->checkParam($request->price);
        $offer->shop_id = $this->checkParam($request->shop_id);


       
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $offer->image = $input['imagename'];
        }

        $offer->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offer] , 200);    
   



    }


        
    /*
        This Function deleteoffer v1.0
        Input:  key(required) ,id (required)       
        Output: delete offer
    */
    public function deleteOffer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


         Offer::destroy($this->checkParam($request->id));

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'Deleted'] , 200);    
    }



    /*
        This Function updateOfferState v1.0
        Input:  'key'(required),'offer_id'(required) , 'state'(required)
        Output: return Offer object
    */
    public function updateOfferState(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','offer_id','state'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


    
        $id = $this->checkParam($request->offer_id);
        $offer = Offer::where('id', $id )->first();
        $offer->active = $this->checkParam($request->state) ;
        $offer->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $offer] , 200);    
    }




    //////////////////////////////////////////////////////////////////////////////////////////////////////

    /*
        This Function getShopByOwner v1.0
        Input:  key(required)  , token(required)      
        Output: Return shops by Owner(object) 
    */
    public function getShopByOwner(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key', 'token'])){
           return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
       }

       $key = $this->checkParam($request->key);
       if ($key !== self::KEY) {
           return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
       }

        // check if customers exists
        $user = Owner::where('token' , $this->checkParam($request->token))->first();
        if($user == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'owner is not exist' ] , 400);
        }

       $ownerShops = Shop::where('owner_id',$user->id )->get();
      
       return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $ownerShops] , 200);   
   }



}
