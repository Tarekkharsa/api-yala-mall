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
    Scategory,
    SizeType,
    Gallery,
    ProductSize};
use Intervention\Image\ImageManagerStatic as Image;
use App\Cobon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class DashbordProductController extends MyFunction
{



    /*
        This Function addProduct v1.0
        Input:  'key'(required),'token'(required),'name'(required),
        'description'(required),'price'(required),'discount'(required)
        ,'shop_id'(required),'size_id'(required),'pcategory_id'(required),'images'(required)
        Output: Return  Product object
    */
    public function addProduct(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','token','name','description','price','discount','shop_id','sizes','pcategory_id','images'])){
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
        // check if owner exists
        $owner = Owner::where('token' , $this->checkParam($request->token))->first();
        if($owner == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Owner is not exist' ] , 400);
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

        // $size_product = new ProductSize;
        // $size_product->size_id = $this->checkParam($request->size_id);
        // $size_product->product_id = $NewProduct->id;
        // $size_product->save();
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
        if(!$this->requiredParams($request, ['key','id','token','name','description','price','discount','shop_id','sizes','pcategory_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $shop_id =$this->checkParam($request->shop_id);
        $mall_id = $this->getMallIdByShop($shop_id);
        $id =$this->checkParam($request->id);

        if($this->checkParam($request->discount)!= null && $this->checkParam($request->discount)!= 0){
            $discount = $this->checkParam($request->discount)/100;
        }else if($this->checkParam($request->discount)== 0){
            $discount = 1;
        }
        // check if owner exists
        $owner = Owner::where('token' , $this->checkParam($request->token))->first();
        if($owner == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Owner is not exist' ] , 400);
        }

     
        $NewProduct = Product::where('id',$id )->first();
        $NewProduct->name          = $this->checkParam($request->name);
        $NewProduct->description          = $this->checkParam($request->description);
        $NewProduct->price          = $this->checkParam($request->price);
        $NewProduct->discount          = $discount;
        $NewProduct->shop_id          = $this->checkParam($request->shop_id);
        $NewProduct->mall_id          = $mall_id;
        $NewProduct->pcategory_id          = $this->checkParam($request->pcategory_id);
        $NewProduct->save();

        // $size_product =  ProductSize::where('product_id',$NewProduct->id )->first();
        // $size_product->size_id = $this->checkParam($request->size_id);
        // $size_product->product_id = $NewProduct->id;
        // $size_product->save();
        
        $NewProduct->sizes()->sync($request->sizes);

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








    /*
        This Function updateProductState v1.0
        Input:  'key'(required),'product_id'(required) , 'state'(required)
        Output: return Product object
    */
    public function updateProductState(Request $request){
        
        // check params 
        if(!$this->requiredParams($request, ['key','product_id','state'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        // // check if owner exists
        // $owner = Owner::where('token' , $this->checkParam($request->token))->first();
        // if($owner == NULL)
        // {
        //     return response()->json(['status' => 'error' , 'message' => 'Owner is not exist' ] , 400);
        // }  
         $product_id = $this->checkParam($request->product_id);
        $product = Product::where('id', $product_id )->first();
        $product->available = $this->checkParam($request->state);
        $product->save();

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => $product] , 200);    
    }


    





    

    /*
        This Function deleteShop v1.0
        Input:  key(required)        
        Output:  return delete message
    */
    public function deleteProduct(Request $request){
        // check params 
        if(!$this->requiredParams($request, ['key','id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }


       Product::destroy($this->checkParam($request->id));

        return response()->json(['status' => 'success' , 'message' => 'OK', 'data' => 'Deleted'] , 200);    
    }





    
}
