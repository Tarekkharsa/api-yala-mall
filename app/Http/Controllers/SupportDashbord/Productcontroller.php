<?php

namespace App\Http\Controllers\SupportDashbord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\{
    Order,
    offer,
    Customer,
    Owner,
     Product,
     Shop,
    Bill,BillProduct,
    Mall,
    Scategory,
    ShopStatus,
    Pcategory,
    Gallery,
    Size};
    use App\Http\Controllers\MyFunction;
    use App\Cobon;
use Carbon\Carbon;
class Productcontroller extends MyFunction
{
    
       /*
        This Function getProducts v1.0
        Input:  key(required)  
        Output: Return all Products with gallery with shop 
    */
    public function getProducts(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $Products = Product::with('gallery')
                            ->with('shop.mall')
                            ->where('available' ,1)
                            ->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Products] , 200);
    }

        

       /*
        This Function getProduct v1.0
        Input:  key(required)  , id 
        Output: Return  Product By id with shop with mall and  gallery
    */
    public function getProduct(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $Products = Product::with('gallery')
                            ->with('shop.mall')
                            ->where('available' ,1)
                            ->where('id',$id)
                            ->get();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Products] , 200);

    }




    
    /*
        This Function addProduct v1.0
        Input:  'key'(required),'token'(required),'name'(required),
        'description'(required),'price'(required),'discount'(required)
        ,'shop_id'(required),'size_id'(required),'pcategory_id'(required),'images'(required)
        Output: Return  Product object
    */
    public function addProduct(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','name','description','price','discount','shop_id'
        ,'sizes','pcategory_id','images'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $shop_id =$request->shop_id;
        $mall_id = $this->getMallIdByShop($shop_id);

        if($this->checkParam($request->discount)!= null && $this->checkParam($request->discount)!= 0){
            $discount = $this->checkParam($request->discount)/100;
        }else if($this->checkParam($request->discount)== 0){
            $discount = 1;
        }

     
        $NewProduct = new Product;
        $NewProduct->name          = $this->checkParam($request->name);
        $NewProduct->description          = $this->checkParam($request->description);
        $NewProduct->price          = $this->checkParam($request->price);
        $NewProduct->discount          = $discount;
        $NewProduct->shop_id          = $this->checkParam($request->shop_id);
        $NewProduct->mall_id          = $mall_id;
        $NewProduct->pcategory_id          = $this->checkParam($request->pcategory_id);
        $NewProduct->available          = $this->checkParam($request->available);
        $NewProduct->save();


        $NewProduct->sizes()->attach($request->sizes);
        

      
        if(count($request->images) != 0)
        {
            foreach($request->images as $one)
            {
                $image = new Gallery;
                $image_name = rand().time().rand().'.'. $one->getClientOriginalExtension();
                $image->image =  $image_name;
                $image->product_id = $NewProduct->id;
                Image::make($one)->save('upload/'. $image_name);
                $image->save();
            }
        }

  
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $NewProduct] , 200);    
    }





    
    /*
        This Function addProduct v1.0
        Input: id(required),'key'(required),'token'(required),'name'(required),
        'description'(required),'price'(required),'discount'(required)
        ,'shop_id'(required),'size_id'(required),'pcategory_id'(required),'images'(required)
        Output: Return  Product object
    */
    public function updateProduct(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id','shop_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $shop_id =$this->checkParam($request->shop_id);
        $mall_id = $this->getMallIdByShop($shop_id);
        $id =$this->checkParam($request->id);

        if (isset($request->discount)) {
            if($this->checkParam($request->discount)!= null && $this->checkParam($request->discount)!= 0){
                $discount = $this->checkParam($request->discount)/100;
            }else if($this->checkParam($request->discount)== 0){
                $discount = 1;
            }
        }

        $NewProduct = Product::where('id',$id )->first();
        if (isset($request->name)) {
            $NewProduct->name          = $this->checkParam($request->name);
        }
        if (isset($request->description)) {
            $NewProduct->description          = $this->checkParam($request->description);
        }
        if (isset($request->price)) {
            $NewProduct->price          = $this->checkParam($request->price);
        }
        if (isset($request->shop_id)) {
            $NewProduct->shop_id          = $this->checkParam($request->shop_id);
        }
        if (isset($request->pcategory_id)) {
            $NewProduct->pcategory_id          = $this->checkParam($request->pcategory_id);
        }
        $NewProduct->discount          = $discount;        
        $NewProduct->mall_id          = $mall_id;      
        $NewProduct->save();

        // $size_product =  ProductSize::where('product_id',$NewProduct->id )->first();
        // $size_product->size_id = $this->checkParam($request->size_id);
        // $size_product->product_id = $NewProduct->id;
        // $size_product->save();
        if ($request->sizes) {
            $NewProduct->sizes()->sync($request->sizes);
        }
        

        $oldImages = Gallery::where('product_id',  $NewProduct->id)->delete();
        
       if(isset($request->images)){
            if(count($request->images) != 0)
            {
                foreach($request->images as $one)
                {
                    $image = new Gallery;
                    $image_name = rand().time().rand().'.'. $one->getClientOriginalExtension();
                    $image->image =  $image_name;
                    $image->product_id = $NewProduct->id;
                    Image::make($one)->save('upload/'. $image_name);
                    $image->save();
                }
            }

       }
   
  
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $NewProduct] , 200);    
    }


    //updateProductState in DashbordProductController
    //deleteProduct      in DashbordProductController

   /*
        This Function get Pcategory  v1.0
        Input:  key  
        Output: get all Pcategory
    */
    public function getPcategory(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }

        $id = $this->checkParam($request->id);

        $Pcategory = Pcategory::where('scatogory_id', $id)
                                ->get();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $Pcategory] , 200);

    }


        /*
        This Function deleteProduct v1.0
        Input:  key(required)        
        Output:  return delete message
    */
    public function deleteProduct(Request $request){

    	$validator = Validator::make($request->all(), [
	        'id'     => 'required',
	        'key'    => 'required',
    	]);

	    if ($validator->fails()) {
	        return response()->json(['status' => 'error' , 'message' =>  $validator->errors() ] , 400);
	    }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' =>  __('errors.invalid-request') ] , 400);
        }

        $id = $this->checkParam($request->id);
        $product = Product::where('id' , $id)->first();
        if(empty($product)){
        	return response()->json(['status' => 'error' , 'message' =>  __('errors.product-not-exists') ] , 400);
        }

        
          $product->delete();

        return response()->json(['status' => 'success' , 'message' => __('errors.product-deleted-successfuly')] , 200);
    }



    public function getSizes(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }



        $sizes = Size::all();
        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $sizes] , 200);

    }
}
