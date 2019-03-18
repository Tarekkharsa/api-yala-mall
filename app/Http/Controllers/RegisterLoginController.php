<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Carbon\Carbon;
class RegisterLoginController extends MyFunction
{

   
    /*
        This Function register v1.0
        Input:  key ,  phone
        Output: Add  into database | 
    */
    public function register(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key' , 'phone'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        if(!$this->verifyPhone($request->phone)) {
            return response()->json(['status' => 'error' , 'message' => 'phone not valid' ] , 400);
        }

      
        
        $customer  = Customer::where('phone' , $this->checkParam($request->phone))->first();
        if(!empty($customer))
        {
            return response()->json(['status' => 'success' , 'message' => 'customer exist'  , 'data' => ''] , 200);
        } else {
            $customer = new Customer;
            $customer->phone             = $this->checkParam($request->phone);
            $customer->verification_code = rand ( 1000 , 9999 );
            $customer->token             = $this->randoomString(32);
            $customer->verification_request_time = Carbon::now();
            $customer->save();

            return response()->json(['status' => 'success' , 'message' => 'add customer suuccessfully'  , 'data' => $customer] , 200);
        }
    }


    /*
        This Function login v1.0
        Input:  key  , phone , verification_code
        Output: Return Customer
    */
    public function login(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key' , 'phone' , 'verification_code'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        if(!$this->verifyPhone($request->phone)) {
            return response()->json(['status' => 'error' , 'message' => 'phone not valid' ] , 400);
        }

        

        $customer  = Customer::where('phone' , $this->checkParam($request->phone))
        ->with('addresses')
        ->first();
        if(!empty($customer))
        {
            if($customer->verification_code == $this->checkParam($request->verification_code))
            {
                return response()->json(['status' => 'success' , 'message' => 'OK'  , 'data' => $customer] , 200);
            } else{
                return response()->json(['status' => 'error' , 'message' => 'invaild verification code'] , 400);
            }
            
        } else{
            return response()->json(['status' => 'error' , 'message' => 'invalid data'] , 400);
        }
    } 



}
