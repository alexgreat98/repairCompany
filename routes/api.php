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

Route::get('services_images/{service}', 'Admin\ServiceController@ServicesImage');
Route::put('services_images_attach/{service}/image/{image}', 'Admin\ServiceController@ServicesImageAttach');
Route::delete('services_images_detach/{image}', 'Admin\ServiceController@ServicesImageDetach');
Route::post('services_image_add/{service}', 'Admin\ServiceController@ServiceImageAdd');
Route::delete('services_image_delete/{service}', 'Admin\ServiceController@ServiceImageDelete');
Route::get('services_prices/{service}', 'Admin\PriceController@ServicesPrice');
Route::resource('services', 'Admin\ServiceController');
Route::resource('prices', 'Admin\PriceController');
Route::resource('params', 'Admin\ParamsController');
Route::resource('users', 'Admin\UserController');
Route::resource('portfolio', 'Admin\PortfolioController');
Route::resource('images', 'Admin\ImageController'); //TODO вот тут я поменял урл, посмотри у себя чтоб запросы теперь слались на него

