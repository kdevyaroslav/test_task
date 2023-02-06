<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;

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

Route::group(['prefix' => 'product'], function(){
    Route::post('/set_data', [ProductController::class, 'setData']);

    Route::get('/get_data/{id}', [ProductController::class, 'getData']);

    Route::post('/update_data_bulk', [ProductController::class, 'updateData']);
});


Route::post('/bulk_insert', [ProductController::class, 'bulkInsert']);

Route::group(['prefix' => 'seller'], function(){
    Route::post('/set_data', [SellerController::class, 'setData']);
});
