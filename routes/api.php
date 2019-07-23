<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/images/{name}', 'MyFunction@image');

Route::post('/register', 'RegisterLoginController@register');
Route::post('/login', 'RegisterLoginController@login');
Route::get('/getCities', 'CityLocationController@getCities');
Route::get('/getMalls', 'MallController@getMalls');

Route::get('/getOfferByMall', 'MallController@getOfferByMall');



Route::get('/getShops', 'ShopController@getShops');
Route::get('/getShop', 'ShopController@getShop');
Route::get('/getShopCategories', 'ShopController@getShopCategories');
Route::get('/getOffers', 'ShopController@getOffers');
Route::get('/getProductByCategory', 'ProductController@getProductByCategory');
Route::get('/getProductByshop', 'ProductController@getProductByshop');
Route::post('/addCustomerLocation', 'CustomerController@addCustomerLocation');
Route::get('/getShopOrders', 'OrderController@getShopOrders');
Route::post('/updateOrderStatus', 'OrderController@updateOrderStatus');
Route::post('/addOrder', 'OrderController@addOrder');
Route::get('/getCustomer', 'CustomerController@getCustomer');
Route::get('/getCategories', 'ShopController@getCategories');
Route::get('/getProductByMall', 'ProductController@getProductByMall');
Route::get('/getProducts', 'ProductController@getProducts');
Route::get('/getCustomerOrders', 'OrderController@getCustomerOrders');
Route::get('/getProductDetails', 'ProductController@getProductDetails');
Route::get('/getPcategory', 'ProductController@getPcategory');
Route::get('/getSizes', 'ProductController@getSizes');
Route::get('/getSizeByPcategory', 'ProductController@getSizeByPcategory');
Route::get('/getCategoryByMall', 'ShopController@getCategoryByMall');
Route::get('/getPcategoryByScategory', 'ProductController@getPcategoryByScategory');
Route::get('/getShopByMall', 'ShopController@getShopByMall');
Route::get('/getFilter', 'FilterController@getFilter');
Route::get('/scategoryByMall', 'MallController@scategoryByMall');
Route::get('/search', 'ProductController@search');
Route::get('/searchByShop', 'ProductController@searchByShop');
Route::get('/searchByMall', 'ProductController@searchByMall');
Route::get('/searchByScategory', 'ProductController@searchByScategory');
Route::get('/getMallById', 'MallController@getMallById');
Route::get('/getShopById', 'ShopController@getShopById');
Route::get('/getScategoryById', 'ProductController@getScategoryById');
Route::get('/getScategory', 'ProductController@getScategory');


Route::get('/getMallIdByProductId', 'OrderController@getMallIdByProductId');
Route::get('/getOfferByShop', 'ShopController@getOfferByShop');

Route::get('/getSliders', 'MallController@getSliders');

Route::post('/addFavorite', 'CustomerController@addFavorite');
Route::post('/deleteFavorite', 'CustomerController@deleteFavorite');
Route::post('/rateShop','CustomerController@rateShop');
Route::post('/rateDriver','CustomerController@rateDriver');
Route::post('/rateProduct','CustomerController@rateProduct');
Route::get('/getServices', 'CustomerController@getServices');

Route::get('/getRateProduct', 'CustomerController@getRateProduct');
Route::get('/getRateShop', 'CustomerController@getRateShop');
Route::get('/getRateDriver', 'CustomerController@getRateDriver');

Route::get('/getFavoriteList', 'CustomerController@getFavoriteList');


Route::get('/rateNotification', 'CustomerController@rateNotification');

//==================================== Api Dashbord ===========================




Route::get('/getDashbordMalls','Dashbord\DashbordMallController@getDashbordMalls');
Route::post('/addMall', 'Dashbord\DashbordMallController@addMall');
Route::post('/updateMall', 'Dashbord\DashbordMallController@updateMall');
Route::post('/deleteMall', 'Dashbord\DashbordMallController@deleteMall');



Route::post('/addShop', 'Dashbord\DashbordShopController@addShop');
Route::post('/updateShop', 'Dashbord\DashbordShopController@updateShop');
Route::post('/deleteShop', 'Dashbord\DashbordShopController@deleteShop');
Route::post('/addScategory', 'Dashbord\DashbordShopController@addScategory');
Route::post('/addPcategory', 'Dashbord\DashbordShopController@addPcategory');
Route::post('/addSize', 'Dashbord\DashbordShopController@addSize');

Route::get('/getOrders', 'Dashbord\DashbordShopController@getOrders');




Route::post('/addCity', 'Dashbord\DashbordDeliveryController@addCity');
Route::post('/addLocation', 'Dashbord\DashbordDeliveryController@addLocation');
Route::post('/addCar', 'Dashbord\DashbordDeliveryController@addCar');
Route::get('/getDrivers', 'Dashbord\DashbordDeliveryController@getDrivers');
Route::post('/blockDrivers', 'Dashbord\DashbordDeliveryController@blockDrivers');
Route::post('/addDriver', 'Dashbord\DashbordDeliveryController@addDriver');
Route::post('/updateDriver', 'Dashbord\DashbordDeliveryController@updateDriver');
Route::get('/getAllCustomer', 'Dashbord\DashbordDeliveryController@getAllCustomer');
Route::post('/blockCustomer', 'Dashbord\DashbordDeliveryController@blockCustomer');


Route::get('/getLocationsByCityId', 'Dashbord\DashbordDeliveryController@getLocationsByCityId');
Route::post('/addOwner', 'Dashbord\DashbordDeliveryController@addOwner');

//================================== owner Dashbord =================
Route::post('/owner/login', 'Dashbord\OwnerController@login');

Route::get('/owner/getShopByOwner', 'Dashbord\DashbordShopController@getShopByOwner');
Route::post('/owner/addProduct', 'Dashbord\DashbordProductController@addProduct');
Route::post('/owner/updateProductState', 'Dashbord\DashbordProductController@updateProductState');
Route::post('/owner/deleteProduct', 'Dashbord\DashbordProductController@deleteProduct');


Route::get('/owner/getOffer', 'Dashbord\DashbordShopController@getOffer');
Route::post('/owner/addOffer', 'Dashbord\DashbordShopController@addOffer');
Route::post('/owner/updateOffer', 'Dashbord\DashbordShopController@updateOffer');
Route::post('/owner/deleteOffer', 'Dashbord\DashbordShopController@deleteOffer');
Route::post('/owner/changeOfferStatus', 'Dashbord\OwnerController@changeOfferStatus');

Route::post('/owner/changeShopStatus', 'Dashbord\OwnerController@changeShopStatus');

Route::get('/owner/getOffers', 'Dashbord\OwnerController@getOffers');

Route::get('/owner/getSizeByPcategory', 'Dashbord\OwnerController@getSizeByPcategory');
Route::get('/owner/getPcategory', 'Dashbord\OwnerController@getPcategory');

Route::get('/owner/getProductByOwner', 'Dashbord\OwnerController@getProductByOwner');


Route::post('/owner/updateProduct', 'Dashbord\DashbordProductController@updateProduct');
Route::get('/owner/getProductDetails', 'Dashbord\OwnerController@getProductDetails');


Route::get('/owner/getOrders', 'Dashbord\OwnerController@getOrders');

//================================== Support Dashbord =================


Route::group(['prefix' => '/dashbord'], function () {
    Route::get('getMalls', 'SupportDashbord\Mallcontroller@getMalls');
    Route::get('getMall', 'SupportDashbord\Mallcontroller@getMall');
    Route::post('/addMall', 'SupportDashbord\Mallcontroller@addMall');
    Route::post('/updateMall', 'SupportDashbord\Mallcontroller@updateMall');
    Route::post('/deleteMall', 'SupportDashbord\Mallcontroller@deleteMall');
    
    Route::get('getShops', 'SupportDashbord\Shopcontroller@getShops');
    Route::get('getShop', 'SupportDashbord\Shopcontroller@getShop');
    
    Route::post('/addShop', 'SupportDashbord\Shopcontroller@addShop');
    Route::post('/updateShop', 'SupportDashbord\Shopcontroller@updateShop');
    Route::post('/deleteShop', 'SupportDashbord\Shopcontroller@deleteShop');
    
    Route::get('getProducts', 'SupportDashbord\Productcontroller@getProducts');
    Route::get('getProduct', 'SupportDashbord\Productcontroller@getProduct');

    Route::post('addProduct', 'Dashbord\Productcontroller@addProduct');
    

    Route::post('/updateProductState', 'Dashbord\DashbordProductController@updateProductState');
    Route::post('/deleteProduct', 'SupportDashbord\Productcontroller@deleteProduct');

    Route::post('/addCity', 'Dashbord\DashbordDeliveryController@addCity');
    Route::post('/addLocation', 'Dashbord\DashbordDeliveryController@addLocation');
    Route::post('/addCar', 'Dashbord\DashbordDeliveryController@addCar');
    Route::get('/getDrivers', 'Dashbord\DashbordDeliveryController@getDrivers');
    Route::post('/blockDrivers', 'Dashbord\DashbordDeliveryController@blockDrivers');
    Route::post('/addDriver', 'Dashbord\DashbordDeliveryController@addDriver');
    Route::post('/updateDriver', 'Dashbord\DashbordDeliveryController@updateDriver');
    Route::get('/getCustomers', 'Dashbord\DashbordDeliveryController@getAllCustomer');
    Route::post('/blockCustomer', 'Dashbord\DashbordDeliveryController@blockCustomer');
    Route::get('/getLocationsByCityId', 'Dashbord\DashbordDeliveryController@getLocationsByCityId');

    Route::post('/addScategory', 'Dashbord\DashbordShopController@addScategory');
    Route::post('/addPcategory', 'Dashbord\DashbordShopController@addPcategory');
    Route::post('/addSize', 'Dashbord\DashbordShopController@addSize');
    Route::post('/deleteSize', 'Dashbord\DashbordShopController@deleteSize');
    Route::post('/deletePcategory', 'Dashbord\DashbordShopController@deletePcategory');
    Route::post('/deleteScategory', 'Dashbord\DashbordShopController@deleteScategory');

    Route::get('getPcategory', 'SupportDashbord\Productcontroller@getPcategory');
    
    Route::get('/getSliders', 'MallController@getSliders');
    Route::post('/addSliders', 'SupportDashbord\MallController@addSliders');
    Route::post('/updateSliders', 'SupportDashbord\MallController@updateSliders');
    Route::post('/deleteSliders', 'SupportDashbord\MallController@deleteSliders');
    
     Route::get('/getShopStatus', 'SupportDashbord\Shopcontroller@getShopStatus');
    
     Route::get('/getSizes', 'SupportDashbord\Productcontroller@getSizes');

     Route::get('/getShopByMall', 'SupportDashbord\Shopcontroller@getShopByMall');

     
});

Route::group(['prefix' => '/driver'], function () {
    Route::get('/getReadyOrders', 'CarDriverController@getReadyOrders');
    Route::get('/getSuccessOrders', 'CarDriverController@getSuccessOrders');
    Route::get('/getWaitingOrders', 'CarDriverController@getWaitingOrders');
    Route::post('/changeOrderStatus', 'CarDriverController@changeOrderStatus');
    Route::post('/login', 'CarDriverController@login');
    
});
