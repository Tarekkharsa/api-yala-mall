<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
class CityLocationController extends MyFunction
{
    
      /*
        This Function getCities v1.0
        Input:  key  
        Output: Return all cities with locations
    */
    public function getCities(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $cities = City::with('locations')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $cities] , 200);    
    }
}
