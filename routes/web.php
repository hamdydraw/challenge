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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//provider routes
Route::get('/register/provider', 'ProviderController@create');
Route::get('/login/provider', 'ProviderController@loginProvider');
Route::post('/register/provider', 'ProviderController@registerProvider')->name('register.provider');
Route::post('/login/provider', 'ProviderController@providerAuth')->name('login.provider');
Route::get('/addtocart/{product_id}', 'HomeController@addtocart')->name('addtocart');
Route::get('/mycart', 'HomeController@mycart')->name('cart');
//provider routes we want protected 
Route::group(['middleware'=>'providers'], function(){
Route::get('/home/provider', 'ProviderController@home');
Route::post('/logout/provider', 'ProviderController@logout')->name('logout.provider');
Route::get('/provider/newproduct', 'ProductController@create')->name('provider.newproduct');
Route::post('/provider/saveproduct', 'ProductController@store')->name('provider.saveproduct');

});
