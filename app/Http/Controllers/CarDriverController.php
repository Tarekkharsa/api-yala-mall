<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Order,
    offer,
    Customer,
    Owner,
     Product,
     Shop,
    Bill,Driver,
    Mall,
    Scategory,
    Pcategory,
    Size,
    SizeType};
class CarDriverController extends MyFunction
{
    

    /*
        This Function getReadyOrders v1.0
        Input:  key(required)        
        Output: return all  Ready Orders with bills with shop  with order status
    */
    public function getReadyOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $orders = Order::with('bills.shop')->with('status')->where('order_status_id',1)->get();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);    
    }


    /*
        This Function getWaitingOrders v1.0
        Input:  key(required) , token(required)         
        Output: return all  Waiting Orders with bills with shop  with order status
    */
    public function getWaitingOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        // check if owner exists
        $driver = Driver::where('token' , $this->checkParam($request->token))->first();
        if($driver == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Driver is not exist' ] , 400);
        }
        $id = $driver->id;

        $orders = Order::with('bills.shop')->with('status')->where('order_status_id',2)->where('driver_id',$id)->get();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);    
    }

    /*
        This Function getSuccessOrders v1.0
        Input:  key(required) ,token(required)        
        Output: return all  Success Orders with bills with shop  with order status
    */
    public function getSuccessOrders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        // check if owner exists
        $driver = Driver::where('token' , $this->checkParam($request->token))->first();
        if($driver == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Driver is not exist' ] , 400);
        }
        $id = $driver->id;

        $orders = Order::with('bills.shop')->with('status')->where('order_status_id',3)->where('driver_id',$id)->get();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $orders] , 200);    
    }




    /*
        This Function changeOrderStatus v1.0
        Input:  'key'(required),'id'(required) , 'status'(required) ,token(required)
        Output: return order object
    */
    public function changeOrderStatus(Request $request){
        // return  $request;
        // check params 
        if(!$this->requiredParams($request, ['key','id','status','token'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        // check if owner exists
        $driver = Driver::where('token' , $this->checkParam($request->token))->first();
        if($driver == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Driver is not exist' ] , 400);
        }

        $id = $driver->id;
        $order_id = $this->checkParam($request->id);

        $order = Order::where('id', $order_id)->first();
        $order->order_status_id = (int)$this->checkParam($request->status);
        $order->driver_id = $id;
        $order->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $order] , 200);    
    }


}
