<?php

namespace App\Http\Controllers\Dashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\MyFunction;
use App\{
    Order,
    offer,
    Customer,
    Owner,
     Product,
     Shop,
    Bill,BillProduct,
Mall,
Scategory};

use App\Cobon;
use Carbon\Carbon;
class DashbordMallController extends MyFunction
{
    



      //===========================      ===============================
    /*
        This Function getDashbordMalls v1.0
        Input:  key(required)        
        Output: Return all Malls with shops
    */
    public function getDashbordMalls(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $malls =Mall::with('shop')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }

    

    /*
        This Function addMall v1.0
        Input:  key(required), name(required) ,logo(required)
        ,address(required), phone(required),  website(required) ,location_id (required) 
        Output: return  Mall object
    */
    public function addMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','logo','address','phone','website','location_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        
   

        $malls = new Mall;
        $malls->name =$this->checkParam($request->name);
        $malls->address =$this->checkParam($request->address);
        $malls->phone =$this->checkParam($request->phone);
        $malls->website =$this->checkParam($request->website);
        $malls->location_id =$this->checkParam($request->location_id);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $malls->logo = $input['imagename'];
        }


        $malls->save();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }


    
    /*
        This Function updateMall v1.0
        Input:  key(required),id(required) ,name(required) ,logo(required)
        ,address(required), phone(required),  website(required) ,location_id (required)       
        Output: return  Mall object
    */
    public function updateMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','name','logo','address','phone','website','location_id'
        ])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $malls =  Mall::where('id',$request->id )->first();

        $malls->name =$this->checkParam($request->name);
        $malls->address =$this->checkParam($request->address);
        $malls->phone =$this->checkParam($request->phone);
        $malls->website =$this->checkParam($request->website);
        $malls->location_id =$this->checkParam($request->location_id);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $malls->logo = $input['imagename'];
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }



    
     /*
        This Function deleteMall v1.0
        Input:  key(required)        
        Output: return message => OK
    */
    public function deleteMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


         Mall::destroy($this->checkParam($request->id));

        return response()->json(['status' => 'success' , 'message' => 'OK'] , 200);    
    }


    /////////////////////////////////////////

//getShopByMall

}
