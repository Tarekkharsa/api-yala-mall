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

Route::post('/register', 'RegisterLoginController@register');
Route::post('/login', 'RegisterLoginController@login');

Route::get('/getCities', 'CityLocationController@getCities');

Route::get('/getMalls', 'MallController@getMalls');


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



Route::get('/getMallIdByProductId', 'OrderController@getMallIdByProductId');