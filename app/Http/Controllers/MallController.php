<?php

namespace App\Http\Controllers;
use App\Mall;
use Illuminate\Http\Request;

class MallController extends MyFunction
{
     /*
        This Function getMalls v1.0
        Input:  key  
        Output: Return all Malls with location
    */
    public function getMalls(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $malls =Mall::with('location')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }

   
}
