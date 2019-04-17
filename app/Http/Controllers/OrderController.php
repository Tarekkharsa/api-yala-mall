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
        Input:  key(required)   
        Output: Return shop with orders with order status with
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
            Input:  key(required) , id, status_id 
            Output: update Order  status
        */
        public function updateOrderStatus(Request $request){
            if(!$this->requiredParams($request, ['key'])){
                return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
            }
                $order= Order::find($request->id);
                $order->order_status_id         =        $request->status_id;
      
    
               $order->save();
            return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $order] , 200);
    
    
        }





     /*
        This Function getCustomerOrders v1.0
        Input:  key(required)  , token(required)
        Output: Return  Customer with Orders
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
        Input:  key  , products[product_id , quantity , notes] , token , customer_location_id  , order_time , 
                order_price 
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

       


    //check if products are the same mall
       $mall_id = $this->getMallId($orderProducts[0]->product_id);
       foreach($orderProducts as $product){
           $row = $this->getMallId($product->product_id); 
           if ($row != $mall_id) {
               return response()->json(['status' => 'error' , 'message' => 'products are not in the same Mall' ] , 400);
           }
 
       }

      

        // calculate price of products create array allProductsDetails=> marge array customer(orderProducts) and array ProductsDetails from DataBase
        $i=0;
        $price = 0;
        $allProductsDetails = array();
        foreach($orderProducts as $product){
            $row = Product::where('id',$product->product_id)->with('shop')->get();    

            $allProductsDetails[$i]['id']=$product->product_id;
            $allProductsDetails[$i]['notes']=$product->notes;
            $allProductsDetails[$i]['quantity']=$product->quantity;
            $allProductsDetails[$i]['shop_id']=$row[0]->shop_id;
            $allProductsDetails[$i]['price']=$row[0]->price;
            $allProductsDetails[$i]['discount']=$row[0]->discount;
            if (empty($row)) {
                return response()->json(['status' => 'error' , 'message' =>  __('errors.invalid-products') ] , 400);
            }
            
            $productPrice = $row[0]->price;
            $productPric = $productPrice *  $row[0]->discount;
            $price += ($productPrice * $product->quantity);
            $i++;
        }


      
   // check sale of shop and min Total Shop Cost
        $allShops = array();
        $minTotalShopCost = 0 ;
        $shopDiscount = 0;
        foreach ($orderProducts as  $product) {         
     
         $productTmp = Product::find($product->product_id);
         $shop = Shop::where('id', $productTmp->shop_id)->first();
        
        for($i = 0 ; $i< count($allProductsDetails); $i++){
            
            if($allProductsDetails[$i]['shop_id'] == $shop->id){
                $minTotalShopCost = $minTotalShopCost + $allProductsDetails[$i]['price'] * $allProductsDetails[$i]['quantity'] ;
            }
        }

        if($minTotalShopCost <= $shop->min_order_cost){
            return response()->json(['status' => 'error' , 'message' => __('errors.price-in-not-equal-the-mi-order-cost') ] , 400);
          }

          
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

  


        // check order time if noll and insert it
        $orderTime = $this->checkParam($request->order_time);
        if ($orderTime == NULL) $orderTime = Carbon::now();
                  
  
        // insert order
        $order = new Order;
        $order->order_time           = $this->checkParam($orderTime) ;
        
        $order->customer_id          = $customer->id;
        $order->customer_location_id = $this->checkParam($request->customer_location_id);
        $order->price                = $final_price;
   
        $order->order_status_id            = 1;
        $order->save();

        $totalBill = 0;
                                                                 // insert bill to each shop and many billProduct to each bill
        // MAIN Foreach TO Add bell for each Shop
        foreach ($allShops as  $shop) {          
            // Calculate The Total Price For The Shop bill 
            for($i = 0 ; $i< count($allProductsDetails); $i++){
            
                if($allProductsDetails[$i]['shop_id'] == $shop->id){
                    $totalBill = $totalBill + $allProductsDetails[$i]['price'] * $allProductsDetails[$i]['quantity'] ;
                }
            }

            $bill = new Bill;
            $bill->order_id =  $order->id;
            $bill->shop_id =  $shop->id;
            $bill->price =  $totalBill;
            $bill->save();
            $totalBill = 0;   
          for($i = 0 ; $i< count($allProductsDetails); $i++){
            
              if($allProductsDetails[$i]['shop_id'] == $shop->id){

                $billProduct = new BillProduct;
                $billProduct->product_id =  $allProductsDetails[$i]['id'];
                $billProduct->bill_id   =   $bill->id;
                $billProduct->sale =  $allProductsDetails[$i]['discount'];
                $billProduct->quantity   = $allProductsDetails[$i]['quantity'];
                $billProduct->notes      =$allProductsDetails[$i]['notes'];
                $billProduct->save();
              }
          }
    
        }
 
        return response()->json([  'message' => __('errors.ok')  , 'data' => Order::find($order->id)] , 200);
    }



 



}
