<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pageIndex');
});
Route::get('/about-us', function () {
    return view('pageAbout');
});
Route::get('/services', 'Client\PageController@GetServices');
Route::get('/services/{web_service}', 'Client\PageController@GetService');
Route::get('/portfolio', 'Client\PageController@GetPortfolio');
Route::get('/portfolio/item', function () {
    return view('portfolioItem');
});
Route ::get('/admin', function(){
    return view('admin/index');
});
Route::get('/services/electro', function () {
    return view('service');
});
