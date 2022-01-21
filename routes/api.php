<?php

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\OrderRepartidoreController;
use App\Http\Controllers\RepartidoreController;
use App\Models\OrderRepartidore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('repartidores', [RepartidoreController::class, 'store']);
Route::post('login', [RepartidoreController::class, 'login']);
Route::post('logout', [RepartidoreController::class, 'logout']);

Route::group(['middleware' => 'auth:sanctum'], function (){
});

Route::get('repartidores', [RepartidoreController::class, 'getRepartidores']);
Route::post('orders',[OrderRepartidoreController::class,'Orders']);
Route::put('orders/updated',[OrderController::class,'updatedOrder']);
Route::get('order/{order_id}',[OrderController::class,'getOrder']);
