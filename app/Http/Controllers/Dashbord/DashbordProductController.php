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
    Gallery};
use Intervention\Image\ImageManagerStatic as Image;
use App\Cobon;
use Carbon\Carbon;
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
        if(!$this->requiredParams($request, ['key','token','name','description','price','discount','shop_id','size_id','pcategory_id'])){
            return response()->json(['status' => 'error' , 'message' => 'missing  params' ] , 400);
        }

        $key = $this->checkParam($request->key);
        if ($key !== self::KEY) {
            return response()->json(['status' => 'error' , 'message' => 'invalid request' ] , 400);
        }
        $shop_id =$request->shop_id;
        $mall_id = $this->getMallIdByShop($shop_id);

        // check if owner exists
        $owner = Owner::where('token' , $this->checkParam($request->token))->first();
        if($owner == NULL)
        {
            return response()->json(['status' => 'error' , 'message' => 'Owner is not exist' ] , 400);
        }

        $size_pcategories = new SizeType;
        $size_pcategories->name = $this->checkParam($request->name);
        $size_pcategories->pcategory_id = $this->checkParam($request->pcategory_id);
        $size_pcategories->size_id = $this->checkParam($request->size_id);
        $size_pcategories->save();
        

        $NewProduct = new Product;
        $NewProduct->name          = $this->checkParam($request->name);
        $NewProduct->description          = $this->checkParam($request->description);
        $NewProduct->price          = $this->checkParam($request->price);
        $NewProduct->discount          = $this->checkParam($request->discount);
        $NewProduct->shop_id          = $this->checkParam($request->shop_id);
        $NewProduct->mall_id          = $mall_id;
        $NewProduct->size_pcategory_id          = $size_pcategories->id ;
        $NewProduct->save();

 
      
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
         $product_id = $request->product_id;
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


    public function addItem(Request $request){
		


		
		if(!empty($request->images))
		{
			$images = [];
			foreach($request->images as $one)
			{
				$image_name = rand().time().rand().'.'. $one->getClientOriginalExtension();
				array_push($images, $image_name);
				$img = Image::make($one)->encode('jpg', 75);
				$img->save('upload/'.$image_name);
			}
		}

		if(!empty($images)){
			for ($i=0; $i < count($images) ; $i++) { 
				$path = public_path('upload'.'/'.$images[$i]);
     			array_push($arr, ['name'     => 'images[' . $i . ']',
					'contents' => fopen($path, 'r')]);
			}
		}


		return response()->json($res , 200);
	}






    
}
