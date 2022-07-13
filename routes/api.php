<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SaleController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('seller', [SellerController::class, 'getAll']);
Route::get('seller/{id}', [SellerController::class, 'getById']);
Route::post('seller', [SellerController::class, 'store']);
Route::put('seller/{id}', [SellerController::class, 'update']);
Route::delete('seller/{id}', [SellerController::class, 'destroy']);

Route::get('sale', [SaleController::class, 'getAll']);
Route::get('sale/{id}', [SaleController::class, 'getBySeller']);
Route::post('sale', [SaleController::class, 'store']);
Route::put('sale/{id}', [SaleController::class, 'update']);
Route::delete('sale/{id}', [SaleController::class, 'destroy']);

Route::fallback(function(){
    return response()->json([
        'message' => 'End Point não disponível'], 404);
});
