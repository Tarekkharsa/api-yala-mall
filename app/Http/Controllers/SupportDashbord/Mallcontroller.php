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
     Product,
     Shop,
    Bill,BillProduct,
    Mall,
    Scategory,
    Location};
    use Intervention\Image\ImageManagerStatic as Image;
class Mallcontroller extends MyFunction
{
    


       //===========================      ===============================
    /*
        This Function getMalls v1.0
        Input:  key(required)        
        Output: Return all Malls with location  and city
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


        $malls =Mall::with('location.city')->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $malls] , 200);    
    }

        /*
        This Function getMall v1.0
        Input:  key(required)        
        Output: Return  Mall by id
    */
    public function getMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);

        $mall =Mall::with('location.city')->where('id',$id)->first();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $mall] , 200);    
    }

    

    /*
        This Function addMall v1.0
        Input:  key(required), name(required) ,logo(required)
        ,address(required), phone(required),  website(required) ,location_id (required) 
        Output: return  Mall object
    */
    public function addMall(Request $request){
        // check params 
        
         if(!$this->requiredParams($request, ['key','name','logo','address','phone','location_id','open_time','close_time'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $locations = Location::where('id', $request->location_id)->first();
        if ( $locations == null) {
            return response()->json(['status' => 'error' , 'message' => 'location not found' ] , 400);
        }

        $malls = new Mall;
        $malls->name =$this->checkParam($request->name);
        $malls->address =$this->checkParam($request->address);
        if (isset($request->website)) {
            $malls->website =$this->checkParam($request->website);
        }

        $malls->phone =$this->checkParam($request->phone);
        $malls->location_id =$this->checkParam($request->location_id);
        $malls->open_time =$this->checkParam($request->open_time);
        $malls->close_time =$this->checkParam($request->close_time);
        $malls->lat =$this->checkParam($request->lat);
        $malls->lng =$this->checkParam($request->lng);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $dest = public_path('/images');
            $image->move($dest, $input['imagename']);
            $malls->logo = $input['imagename'];
        }
        $malls->save();
        
        return response()->json(['status' => 'success' , 'message' => __('add mall suuccessfully'), 'data' => $malls] , 200);    
    }


    
    /*
        This Function updateMall v1.0
        Input:  key(required),id(required) ,name(required) ,logo(required)
        ,address(required), phone(required),  website(required) ,location_id (required)       
        Output: return  Mall object
    */
    public function updateMall(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id' ])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $id = $this->checkParam($request->id);

        $malls =  Mall::where('id',$id )->first();
        if (isset($request->name)) {
            $malls->name =$this->checkParam($request->name);
        }
        if (isset($request->address)) {
            $malls->address =$this->checkParam($request->address);
        }
        if (isset($request->phone)) {
            $malls->phone =$this->checkParam($request->phone);
        }
        if (isset($request->phone)) {
            $malls->phone =$this->checkParam($request->phone);
        }
        if (isset($request->website)) {
            $malls->website =$this->checkParam($request->website);
        }
        if (isset($request->location_id)) {
            $malls->location_id =$this->checkParam($request->location_id);
        }
        if ($request->location_id) {
            $malls->location_id =$this->checkParam($request->location_id);
        }
        if ($request->open_time) {
            $malls->open_time =$this->checkParam($request->open_time);
        }
        if ($request->close_time) {
            $malls->close_time =$this->checkParam($request->close_time);
        }
        
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
        Input:  key(required),id(required)     
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
        $id = $this->checkParam($request->id);

        $mall = Mall::where('id' , $id)->first();
        if(empty($mall)){
        	return response()->json(['status' => 'error' , 'message' =>  __('errors.mall-not-exists') ] , 400);
        }
            $mall->delete();
         

        return response()->json(['status' => 'success' , 'message' => 'OK'] , 200);    
    }


    /*
        This Function addSliders v1.0
        Input:  key(required)  ,'title','image'      
        Output: Return new   slider
    */
    public function addSliders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','title','image'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


        $sliders = new Slider;
        $sliders->title = $this->checkParam($request->title);

        if($request->image)
        {
                $image_name =  rand().time().rand().'.'. $request->image->getClientOriginalExtension();
                $sliders->image =  $image_name;
                Image::make($request->image)->save('upload/'. $image_name);
                $sliders->save();
        }
 
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $sliders] , 200);    
    }

    /*
        This Function updateSliders  v1.0
        Input:  key(required)    id    
        Output: Return new   slider
    */
    public function updateSliders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $sliders =  Slider::where('id', $id)->first();

        if (isset($request->title)) {
            $sliders->title = $this->checkParam($request->title);
        }
        if (isset($request->image)) {
            if($request->image)
            {
                    $image_name =  rand().time().rand().'.'. $request->image->getClientOriginalExtension();
                    $sliders->image =  $image_name;
                    Image::make($request->image)->save('upload/'. $image_name);
                    $sliders->save();
            }
        }

 
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $sliders] , 200);    
    }


     /*
        This Function deleteSliders  v1.0
        Input:  key(required)    id    
        Output: Return delete sucsses
    */
    public function deleteSliders(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);
        $oldSliders =  Slider::where('id', $id)->first();

        if ($oldSliders) {
            $sliders =  Slider::where('id', $id)->delete();
        }

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'Delete Sucsses'] , 200);    
    }
}
