<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Customer,
    CustomerLocation,
    Location
};


class CustomerController extends MyFunction
{
        /*
        This Function addCustomerLocation v1.0
        Input:  key , token , location_id , address
        Output: Add Review into database | Return Address Object
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
        $customer_location->location_id = $this->checkParam($request->location_id);
        $customer_location->address     = $this->checkParam($request->address);
        $customer_location->save();

        return response()->json(['status' => 'success' , 'message' => 'OK' , 'data' => $customer_location] , 200);
    }


       /*
        This Function getCustomer v1.0
        Input:  key (required)  , token (required)
        Output: return Customer with ( coupons , orders , addresses )
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
}
