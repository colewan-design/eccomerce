<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\BasketItemsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\displayBasketController;
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

Route::post('/subscribe', [CustomersController::class, 'subscribeCustomer']);

Route::prefix('/Basket_Items')->group(function($route){
    Route::get('/index', [BasketItemsController::class, 'index']);
    Route::post('/basket-items-store', [BasketItemsController::class, 'store']);
    Route::put('/basket-items-update/{id}', [BasketItemsController::class, 'update']);
    Route::delete('/basket-items-delete/{id}', [BasketItemsController::class, 'destroy']);
    Route::get('/search/basket-items',  [BasketItemsController::class, 'search']);
});

Route::prefix('/Basket')->group(function($route){
    Route::get('/index', [BasketController::class, 'index']);
    Route::post('/basket-store', [BasketController::class, 'store']);
    Route::put('/basket-update/{id}', [BasketController::class, 'update']);
    Route::delete('/basket-delete/{id}', [BasketController::class, 'destroy']);
    Route::get('/get-items', [BasketController::class, 'getItems']);
    Route::get('/search/basket',  [BasketController::class, 'search']);
});

Route::prefix('/Additional')->group(function($route){
    Route::get('/index', [AdditionalController::class, 'index']);
    Route::post('/additional-store', [AdditionalController::class, 'store']);
    Route::put('/additional-update/{id}', [AdditionalController::class, 'update']);
    Route::delete('/additional-delete/{id}', [AdditionalController::class, 'destroy']);
    Route::get('/search/additional',  [AdditionalController::class, 'search']);
});

Route::prefix('/Display_Basket')->group(function($route){
    Route::get('/index', [displayBasketController::class, 'index']);
});

Route::post('/login', [AuthController::class, 'userLogin']);
Route::post('/logout', [AuthController::class, 'userLogout']);

// SANCTUM SAMPLE ROUTE
// Route::middleware('auth:sanctum')->group( function () {
//     Route::resource('products', ProductController::class);
// });