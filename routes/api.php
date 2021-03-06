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

Route::prefix('v1')->group(function () {
    Route::apiResource('vendors', 'VendorController');
    Route::get('vendors', 'API\VendorController@index');
    Route::get('foods', 'API\FoodController@all');
    Route::post('checkout', 'API\CheckoutController@checkout');
    Route::get('transactions/{id}', 'API\TransactionController@get');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
