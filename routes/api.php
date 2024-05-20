<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CupCakeController;
use App\Http\Controllers\OrdersController;

use App\Http\Middleware\IsAdmin;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/cupcakes', [CupCakeController::class, 'index']);

Route::middleware([IsAdmin::class])->group(function () {
    Route::post('/cupcakes', [CupCakeController::class, 'store']);
    Route::put('/cupcakes/{id}', [CupCakeController::class, 'update']);
    Route::delete('/cupcakes/{id}', [CupCakeController::class, 'destroy']);

});

Route::get('orders', [OrdersController::class, 'index']);
Route::post('orders', [OrdersController::class, 'store']);
Route::get('orders/{id}', [OrdersController::class, 'show']);
Route::put('orders/{id}', [OrdersController::class, 'update']);
Route::delete('orders/{id}', [OrdersController::class, 'destroy']);
