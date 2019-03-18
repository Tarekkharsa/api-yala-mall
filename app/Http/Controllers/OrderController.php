<?php

namespace App\Http\Controllers;
use App\Shop;
use App\{
    Order,
    offer,
    Customer,
     Mall,
     Product,
     CustomerLocation,
    Bill,BillProduct};

use App\Cobon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends MyFunction
{
     /*
        This Function getShopOrders v1.0
        Input:  key  
        Output: Return 
    */
    public function getShopOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $orders = Shop::with('orders.status')->with('bills.orders.driver')->where('id',$request->id)->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);    
    }

          /*
        This Function updateOrderStatus v1.0
        Input:  key , id, status_id 
        Output: update Order By status
        */
        public function updateOrderStatus(Request $request){
            if(!$this->requiredParams($request, ['key'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
                $order= Order::find($request->id);
                $order->order_status_id         =        $request->status_id;
            // if(!empty($request->driver_id)){
            //     $order->driver_id=$request->driver_id;
    
            // }
    
               $order->save();
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $order] , 200);
    
    
        }





     /*
        This Function getCustomerOrders v1.0
        Input:  key  
        Output: Return  CustomerOrders
    */
    public function getCustomerOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
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

        $CustomerOrders = Customer::with('orders.status')->with('orders.driver')->where('id', $customer->id )->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $CustomerOrders] , 200);    
    }







    /*
        This Function addOrder v1.0
        Input:  key  , products[product_id , quantity , notes] , token , customer_location_id , order_category_id , order_time , 
                order_price , coupon , 
        Output: Add  into database | Return order Object       
    */
    public function addOrder(Request $request){
     
  
        // check params 
        if(!$this->requiredParams($request, ['key'  , 'token' , 'products', 'customer_location_id'  , 'order_price'])){
            return response()->json(['status' => 'error' , 'message' => __('errors.missing-params') ] , 400);
        }


    
        $customer  = Customer::where('token' , $this->checkParam($request->token))->first();
        if (empty($customer)) {
             return response()->json(['status' => 'error' , 'message' => __('errors.customer-is-not-exist') ] , 400);
        }
        
        if (!is_array($request->products) || empty($request->products)) {
            return response()->json(['status' => 'error' , 'message' => __('errors.empty-products')  ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' =>  __('errors.invalid-request') ] , 400);
        }

        // get all addresses of the customer
        $addresses = CustomerLocation::where('customer_id' , $customer->id)->get();

        $addressesIds = array();
        foreach($addresses as $address){
            array_push($addressesIds, $address->id);
        }

        //check if address exists
        if(!in_array($this->checkParam($request->customer_location_id), $addressesIds)){
            return response()->json(['status' => 'error' , 'message' => __('errors.the-address-is-not-exists') ] , 400);
        }

     

        // fill orderProducts array 
        $orderProducts = array();
        foreach ($request->products as $one) {
            $one = json_decode($one);
            array_push($orderProducts, $one);            
        }     

       


        
       $mall_id = $this->getMallId($orderProducts[0]->product_id);
           
       foreach($orderProducts as $product){
           $row = $this->getMallId($product->product_id); 
          
           if ($row != $mall_id) {
               return response()->json(['status' => 'error' , 'message' => 'products are not in the same Mall' ] , 400);
           }
 
       }

       $productsDetails = array();

        // calculate price of products
        $i=0;
        $price = 0;
        $test = array();
        foreach($orderProducts as $product){
            //$row = Product::find($product->product_id)->with('shop')->first();
            $row = Product::where('id',$product->product_id)->with('shop')->get();
          
        //    $shopIdToShopArray[$row->shop->id] = $row->shop;
            //array_push($productsDetails, $row);    
            
            $test[$i]['id']=$product->product_id;
            $test[$i]['notes']=$product->notes;
            $test[$i]['quantity']=$product->quantity;
            $test[$i]['shop_id']=$row[0]->shop_id;
            $test[$i]['price']=$row[0]->price;
            $test[$i]['discount']=$row[0]->discount;
            
           

            if($product->product_id == $row[0]->id ){
                //  array_push($orderProducts,[ 0 =>$row]);
                
            }
            if (empty($row)) {
                return response()->json(['status' => 'error' , 'message' =>  __('errors.invalid-products') ] , 400);
            }
            
            $productPrice = $row[0]->price;
            $productPric = $productPrice *  $row[0]->discount;
            $price += ($productPrice * $product->quantity);
            $i++;
        }

        

        

        $allShops = array();
   // discount of shop
        $shopDiscount = 0;
        foreach ($orderProducts as  $product) {         
     
         $productTmp = Product::find($product->product_id);
        $shop = Shop::where('id', $productTmp->shop_id)->first();
        
        if(!in_array($shop,$allShops)){
            array_push($allShops, $shop); 
        }
        if($shop->sale != 1){
            $shopDiscount += $price * $shop->sale ;
        }
        
        }
  
        // calcualte final price 
        $final_price = $price  - $shopDiscount;

        if($final_price != $request->order_price){
          return response()->json(['status' => 'error' , 'message' => __('errors.price-in-not-correct') ,'data'=>$shopDiscount] , 400);
        }

  


        // return response()->json(['status' => 'error' , 'message' => 'xxxxxxxxxxxx prodducts'.$price . ' ' . $shopDiscount ] , 200);
        $orderTime = $this->checkParam($request->order_time);
        if ($orderTime == NULL) $orderTime = Carbon::now();
                    //   return response()->json(['status' => 'error'.$orderTime , 'message' => 'xy'.print_r($request->products, TRUE), 'data' => null ] , 400);
 

                    // /////////////////
             
                    // $productShops = array();
                    
                    // $i=1;
                    // foreach ($allShops as  $shop) {
                    //    //  array_push($productShops, $shop); 
                      
                    //     foreach ($productsDetails as  $product) {
                            
                    //         if($product->shop_id ==$shop->id ){
                    //             $productShops[$shop->id][$i] = $product;
                        
                    //         }
                            
                    //         $i++;
                    //     }
                    //   //  return response()->json(['product->shop_id' => $productShops] , 200);
                        
                    // }


  
                    // ///////////////


        $order = new Order;
        $order->order_time           = $this->checkParam($orderTime) ;
        
        $order->customer_id          = $customer->id;
        $order->customer_location_id = $this->checkParam($request->customer_location_id);
        $order->price                = $final_price;
   
        $order->order_status_id            = 1;
        $order->save();



   
        foreach ($allShops as  $shop) {

            $bill = new Bill;
            $bill->order_id =  $order->id;
            $bill->shop_id =  $shop->id;
            $bill->price =  $final_price;
            $bill->save();
            

               
          for($i = 0 ; $i< count($test); $i++){
            
              if($test[$i]['shop_id'] == $shop->id){

                $billProduct = new BillProduct;
                $billProduct->product_id =  $test[$i]['id'];
                $billProduct->bill_id   =   $bill->id;
                $billProduct->sale =  $test[$i]['discount'];
                $billProduct->quantity   = $test[$i]['quantity'];
                $billProduct->notes      =$test[$i]['notes'];
                $billProduct->save();
              }
          }
    
        }

     
         //return response()->json([  'message' => __('errors.ok')  , 'data' => $bill ] , 200);
        return response()->json([  'message' => __('errors.ok')  , 'data' => Order::find($order->id)] , 200);
    }



 



}
