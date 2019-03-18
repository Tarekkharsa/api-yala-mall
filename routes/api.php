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

Route::get('/getProductByMAll', 'ProductController@getProductByMAll');



Route::get('/getProducts', 'ProductController@getProducts');



Route::get('/getCustomerOrders', 'OrderController@getCustomerOrders');


Route::get('/test/{id}', 'OrderController@test');