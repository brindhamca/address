<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
   

Route::get('/','AddressController@showAddress');

Route::get('/addAddressForm','AddressController@addAddressForm');

Route::post('/registerAddress','AddressController@registerAddress');

Route::get('/delete/{addressId}','AddressController@delete');

Route::get('/edit','AddressController@edit');

