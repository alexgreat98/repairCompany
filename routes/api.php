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


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('services_images/{service}', 'Admin\ServiceController@ServicesImage');
    Route::put('services_images_attach/{service}/image/{image}', 'Admin\ServiceController@ServicesImageAttach');
    Route::delete('services_images_detach/{image}', 'Admin\ServiceController@ServicesImageDetach');
    Route::post('services_image_add/{service}', 'Admin\ServiceController@ServiceImageAdd');
    Route::delete('services_image_delete/{service}', 'Admin\ServiceController@ServiceImageDelete');
    Route::get('services_prices/{service}', 'Admin\PriceController@ServicesPrice');

    Route::resources([
        'services' => 'Admin\ServiceController',
        'prices' => 'Admin\PriceController',
        'params' => 'Admin\ParamsController',
        'users' => 'Admin\UserController',
        'portfolio' => 'Admin\PortfolioController',
        'images' => 'Admin\ImageController',
    ]);

    Route::resource('callback', 'Admin\CallbackController')->only([
        'index', 'edit', 'update', 'destroy'
    ]);
});
