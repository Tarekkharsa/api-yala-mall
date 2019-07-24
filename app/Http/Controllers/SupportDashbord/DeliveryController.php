<?php

namespace App\Http\Controllers\SupportDashbord;
use App\Http\Controllers\MyFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\{
    Order,
    Slider,
    Customer,
    Owner,
    Car,
     Shop,
    Bill,BillProduct,
    Mall,
    Scategory,
    Location};
    use Intervention\Image\ImageManagerStatic as Image;
class DeliveryController extends MyFunction
{
    public function getCars(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        
        $cars = Car::all();
        return response()->json(['status' => 'error' , 'message' => 'sucsses',  'data' => $cars ] , 200);
    }

    public function getCar(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);


        $cars = Car::where('id', 1)->first();
        return response()->json(['status' => 'error' , 'message' => 'sucsses',  'data' => $cars ] , 200);
    }




}
