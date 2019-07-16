<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\MyFunction;
use App\{
    Driver,
    offer,
    Customer,
    Owner,
     Product,
     Shop,
    Bill,BillProduct,
    Car,
    Location,
    City};

use App\Cobon;
use Carbon\Carbon;
class DashbordDeliveryController extends MyFunction
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

        $owner = new Owner;
        $owner->full_name = $this->checkParam($request->full_name);
        $owner->username = $this->checkParam($request->username);
        $owner->password = bcrypt ($this->checkParam($request->password));
        $owner->phone = $this->checkParam($request->phone);
        $owner->token = $this->randoomString(32);
        $owner->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $owner] , 200);    
    }









    /////////

  
     /*
        This Function addCity v1.0
        Input:  key(required) , name(required)        
        Output: return City object
    */
    public function addCity(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $city = new City;
        $city->name = $this->checkParam($request->name);
        $city->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $city] , 200);    
    }


    /*
        This Function addLocation v1.0
        Input:  key(required), name(required) , city_id(required)        
        Output: return Location object
    */
    public function addLocation(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','city_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $location = new Location;
        $location->name = $this->checkParam($request->name);
        $location->city_id = $this->checkParam($request->city_id);
        $location->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $location] , 200);    
    }




    /*
        This Function addCar v1.0
        Input:  key(required)  ,number(required)      
        Output: return  Car object
    */
    public function addCar(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','number'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $car = new Car;
        $car->number = $this->checkParam($request->number);
        $car->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $car] , 200);    
    }



     /*
        This Function getDrivers v1.0
        Input:  key(required)        
        Output: return  all Driver
    */
    public function getDrivers(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $driver = Driver::all();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $driver] , 200);    
    }

     /*
        This Function blockDrivers v1.0
        Input:  key(required) ,id(required) ,  blocked(required)      
        Output:return  Driver object 
    */
    public function blockDrivers(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','blocked'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);

        $driver = Driver::where('id',$id)->first();
        $driver->blocked = $this->checkParam($request->blocked);
        $driver->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $driver] , 200);    
    }




     /*
        This Function addDriver v1.0
        Input:  key(required)  ,username(required), password(required)
         ,lat(required),lng(required) ,car_id(required)   
        Output: return  Driver object
     */
    public function addDriver(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','username','password','lat','lng','car_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   

        $driver = new Driver;
        $driver->username = $this->checkParam($request->username);
        $driver->password = $this->checkParam($request->password);
        $driver->token = $this->randoomString(32);
        $driver->lat = $this->checkParam($request->lat);
        $driver->lng = $this->checkParam($request->lng);
        $driver->car_id = $this->checkParam($request->car_id);
        $driver->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $driver] , 200);    
    }


     /*
        This Function updateDriver v1.0
        Input:  key(required),username(required), password(required) ,
        lat(required),lng(required) ,car_id(required),id(required)          
        Output: return  Driver object
    */
    public function updateDriver(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','username','password','lat','lng','car_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   $id = $this->checkParam($request->id);

        $updatedriver = Driver::where('id',  $id)->first();
        if (isset($request->username)) {
            $updatedriver->username = $this->checkParam($request->username);
        }
        if (isset($request->password)) {
            $updatedriver->password = $this->checkParam($request->password);
        }
        if (isset($request->lat)) {
            $updatedriver->lat = $this->checkParam($request->lat);
        }
        if (isset($request->lng)) {
            $updatedriver->lng = $this->checkParam($request->lng);
        }
        if (isset($request->car_id)) {
            $updatedriver->car_id = $this->checkParam($request->car_id);
        }
        $updatedriver->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $updatedriver] , 200);    
    }





    /*
        This Function getAllCustomer v1.0
        Input:  key(required)        
        Output: return all  Drivers
    */
    public function getAllCustomer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $customers = Customer::all();
      

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $customers] , 200);    
    }



    /*
        This Function blockCustomer v1.0
        Input:  key(required) ,id(required) , blocked(required)        
        Output: return  Customer object
    */
    public function blockCustomer(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','blocked'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);

        $customer = Customer::where('id',$id)->first();
        $customer->blocked = $this->checkParam($request->blocked);
        $customer->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $customer] , 200);    
    }





        /*
        This Function getLocationsByCityId v1.0
        Input:  key , city_id  
        Output: Return all location by city id
    */
    public function getLocationsByCityId(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','city_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $city_id = $this->checkParam($request->city_id);

        $locations = Location::where('city_id',$city_id )->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $locations] , 200);    
    }

}
