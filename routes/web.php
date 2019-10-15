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
})->name('home');
Route::get('/about-us', function () {
    return view('pageAbout');
});
Route::get('/services', 'Client\PageController@GetServices')->name('services');
Route::get('/services/{web_service}', 'Client\PageController@GetService')->name('service');
Route::get('/portfolio', 'Client\PageController@GetPortfolios')->name('portfolio');
Route::get('/portfolio/{portfolio}', 'Client\PageController@GetPortfolio')->name('portfolio.item');

Auth::routes(['register' => false]);


Route::group(['middleware' => 'auth'], function()
{
    Route ::get('/admin', 'Admin\AdminController');
});


//Route::get('/home', 'HomeController@index')->name('home');
