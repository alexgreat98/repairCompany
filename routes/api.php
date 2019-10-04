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

Route::resource('services', 'Admin\ServiceController');
Route::get('services_images/{service}', 'Admin\ServiceController@ServicesImage');
Route::delete('services_image_delete/{image}', 'Admin\ServiceController@ServicesImageDelete');
Route::get('services_prices/{service}', 'Admin\PriceController@ServicesPrice');
Route::resource('prices', 'Admin\PriceController');
Route::resource('params', 'Admin\ParamsController');
Route::resource('users', 'Admin\UserController');
Route::resource('portfolio', 'Admin\PortfolioController');
