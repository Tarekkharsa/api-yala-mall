<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Customer,
    CustomerLocation,
    Location,
    Favorite,
    Service,
    Shop,
    RateService,
    Product,
    Driver,
    Order,
    Notification,
    BillProduct
};
use App\Cobon;
use Carbon\Carbon;
class CustomerController extends MyFunction
{
        /*
            This Function addCustomerLocation v1.0
            Input:  key(required) , token(required) , location_id(required) , address
            Output: Add Review into database | Return customer_locations Object
        */
    public function addCustomerLocation(Request $request){
        // check params 
        
        if(!$this->requiredParams($request, ['key' , 'token' , 'location_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        
        // check if customers exists
        $customer = Customer::where('token' , $this->checkParam($request->token))->first();
        if($customer == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'customer is not exist' ] , 400);
        }

        // check if location exists
        $location = Location::where('id' , $this->checkParam($request->location_id))->first();
        if($location == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'location is not exist' ] , 400);
        }

        $customer_location = new CustomerLocation;
        $customer_location->customer_id = $customer->id;
        $customer_location->location_id = (int)$this->checkParam($request->location_id);
        $customer_location->address     = $this->checkParam($request->address);
        $customer_location->save();

        return response()->json(['status' => 'success' , 'message' => 'OK' , 'data' => $customer_location] , 200);
    }


       /*
            This Function getCustomer v1.0
            Input:  key (required)  , token (required)
            Output: return Customer with (  orders , addresses )
         */
    public function getCustomer(Request $request){

        // check params 
        if(!$this->requiredParams($request, ['key'  ,'token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $customer = Customer::where('token' , $request->token)
        ->with('addresses.location.city')
        ->with('orders.bills.billProduct.product')
        ->first();
        if(empty($customer)) {
            return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
        }

        return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $customer] , 200); 

    }



           /*
            This Function getServices v1.0
            Input:  key (required)  
            Output: return Services 
         */
        public function getServices(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
            $services = Service::all();
    
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $services] , 200); 
    
        }



    
       /*
            This Function addFavorite v1.0
            Input:  key (required)  , token (required) ,product_id
            Output: return Favorite 
         */
        public function addFavorite(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','product_id'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $favorite = new Favorite;
            $favorite->customer_id = $customer->id;
            $favorite->product_id = $this->checkParam($request->product_id);
            $favorite->save();
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $favorite] , 200); 
    
        }

         /*
            This Function deleteFavorite v1.0
            Input:  key (required)  , id(required) ,token
            Output: return Customer 
         */
        public function deleteFavorite(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $id = $this->checkParam($request->id);
            $favorite =  Favorite::where('id', $id)->delete();

            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $customer] , 200); 
    
        }



           /*
            This Function rateShop v1.0
            Input:  key (required)  , id(required) ,token(required),rate (required),notes(required)
            Output: return  shop 
         */
        public function rateShop(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id','rate','notes'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $shop = Shop::where('id', $this->checkParam($request->id))->first();


            $oldRate = RateService::where('shop_id', $shop->id)->where('customer_id',$customer->id)->first();
            if (empty($oldRate)) {
                $newRate = new  RateService;
                $newRate->customer_id = $customer->id;
                $newRate->shop_id = $shop->id;
                $newRate->rate = $this->checkParam($request->rate);
                $newRate->notes =  $this->checkParam($request->notes);
                $newRate->save();
            }else {
                $oldRate->rate = $this->checkParam($request->rate);
                $oldRate->notes =  $this->checkParam($request->notes);
                $oldRate->save();
            }

            
          

            $shopCount = RateService::where('shop_id', $shop->id)->count('id');
            $shopSum = RateService::where('shop_id', $shop->id)->sum('rate');
            $rate =  $shopSum / $shopCount;

            $shop->rate = $rate;
            $shop->save();
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $shop] , 200); 
    
        }

              /*
            This Function rateProduct v1.0
            Input:  key (required)  , id(required) ,token(required),rate (required),notes(required)
            Output: return  Product 
         */
        public function rateProduct(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id','rate','notes'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $product = Product::where('id', $this->checkParam($request->id))->first();

            $oldRate = RateService::where('product_id', $product->id)->where('customer_id',$customer->id)->first();
            if (empty($oldRate)) {
                $newRate = new  RateService;
                $newRate->customer_id = $customer->id;
                $newRate->product_id = $product->id;
                $newRate->rate = $this->checkParam($request->rate);
                $newRate->notes =  $this->checkParam($request->notes);
                $newRate->save();
            }else {
                $oldRate->rate = $this->checkParam($request->rate);
                $oldRate->notes =  $this->checkParam($request->notes);
                $oldRate->save();
            }



            $productCount = RateService::where('product_id', $product->id)->count('id');
            $productSum = RateService::where('product_id', $product->id)->sum('rate');
            $rate =  $productSum / $productCount;

            $product->rate = $rate;
            $product->save();

            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $product] , 200); 
    
        }


                  /*
            This Function rateDriver v1.0
            Input:  key (required)  , id(required) ,token(required),rate (required),notes(required)
            Output: return  Driver 
         */
        public function rateDriver(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id','rate','notes'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $driver = Driver::where('id', $this->checkParam($request->id))->first();


            $oldRate = RateService::where('driver_id', $driver->id)->where('customer_id',$customer->id)->first();
            if (empty($oldRate)) {
                $newRate = new  RateService;
                $newRate->customer_id = $customer->id;
                $newRate->driver_id = $driver->id;
                $newRate->rate = $this->checkParam($request->rate);
                $newRate->notes =  $this->checkParam($request->notes);
                $newRate->save();
            }else {
                $oldRate->rate = $this->checkParam($request->rate);
                $oldRate->notes =  $this->checkParam($request->notes);
                $oldRate->save();
            }


            $driverCount = RateService::where('driver_id', $driver->id)->count('id');
            $driverSum = RateService::where('driver_id', $driver->id)->sum('rate');
            $rate =  $driverSum / $driverCount;

            $driver->rate = $rate;
            $driver->save();

            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $driver] , 200); 
    
        }





        /*
            This Function rateNotification v1.0
            Input:  key (required)  
            Output: return  ok 
         */
        public function rateNotification(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key','token'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }

            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
     
           $orders = Order::with('bills.bill_products') ->whereHas('bills.bill_products', function ($query)  {
            $query->where('rated','0');
            })->get();

        

           foreach ($orders as  $order) {
            $created = new Carbon($order->created_at);
            $now = Carbon::now();
           // $difference =  $created->diffForHumans($now);
            if ($created->diff($now)->days > 2) {
                foreach ($order->bills as  $bill) {
                    foreach ($bill->bill_products as  $bill_product) {
                        //return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $bill_product->product_id] , 200);    

                        if (!$bill_product->rated == 1 ) {
                                $BillProduct  = BillProduct::where('id', $bill_product->id)->first();
                                $BillProduct->rated = 1 ;
                                $BillProduct->save();
        
                                $notification =  new Notification;
                                $notification->title = 'title';
                                $notification->description = 'description';
                                $notification->product_id = $bill_product->product_id;
                                $notification->customer_id = $customer->id;
                                $notification->save();
                        }
 
                    }
                }
            }

           }

            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => 'ok'] , 200); 
    
        }


        /*
            This Function getRateProduct v1.0
            Input:  key  , token , id
            Output: return  ok 
         */
        public function getRateProduct(Request $request){

                  // check params 
                  if(!$this->requiredParams($request, ['key'  ,'token','id'])){
                    return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
                }

                $key = $this->checkParam($request->key);
                if ($key !== self::KEY) {
                    return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
                }
        
        
                $customer = Customer::where('token' , $request->token)->first();
                if(empty($customer)) {
                    return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
                }
                $product = Product::where('id', $this->checkParam($request->id))->first();
    
                $oldRate = RateService::where('product_id', $product->id)->where('customer_id',$customer->id)->first();

                if ($oldRate) {
                    return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $oldRate] , 200); 
                }else{
                    return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => 0] , 200); 
                  }
        }


        /*
            This Function getRateProduct v1.0
            Input:  key  , token , id
            Output: return  ok 
         */
        public function getRateShop(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id'])){
              return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
          }

          $key = $this->checkParam($request->key);
          if ($key !== self::KEY) {
              return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
          }
  
  
          $customer = Customer::where('token' , $request->token)->first();
          if(empty($customer)) {
              return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
          }
          $shop = Shop::where('id', $this->checkParam($request->id))->first();

          $oldRate = RateService::where('shop_id', $shop->id)->where('customer_id',$customer->id)->first();

          if ($oldRate) {
              return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $oldRate] , 200); 
          }else{
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => 0] , 200); 
          }
  }

          /*
            This Function getRateProduct v1.0
            Input:  key  , token , id
            Output: return  ok 
         */
        public function getRateDriver(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'token','id'])){
              return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
          }

          $key = $this->checkParam($request->key);
          if ($key !== self::KEY) {
              return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
          }
  
  
          $customer = Customer::where('token' , $request->token)->first();
          if(empty($customer)) {
              return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
          }
          $driver = Driver::where('id', $this->checkParam($request->id))->first();

          $oldRate = RateService::where('driver_id', $driver->id)->where('customer_id',$customer->id)->first();

          if ($oldRate) {
              return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $oldRate] , 200); 
          }else{
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => 0] , 200); 
          }
  }




         /*
            This Function getFavorite v1.0
            Input:  key (required)  , token (required) 
            Output: return Favorite 
         */
        public function getFavoriteList(Request $request){

            // check params 
            if(!$this->requiredParams($request, ['key'  ,'
            '])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
    
            $key = $this->checkParam($request->key);
            if ($key !== self::KEY) {
                return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
            }
    
    
            $customer = Customer::where('token' , $request->token)->first();
            if(empty($customer)) {
                return response()->json(['status' => 'error' , 'message' => 'customer not exists' ] , 400);
            }
            $id = $customer->id;
            $favorite = Favorite::where('customer_id',$id)->with('product.gallery')->get();

            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $favorite] , 200); 
    
        }
}
