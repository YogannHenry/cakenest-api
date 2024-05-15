<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CupCakeController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/cupcakes', [CupCakeController::class, 'index']);
Route::post('/cupcakes', [CupCakeController::class, 'store']);
Route::put('/cupcakes/{id}', [CupCakeController::class, 'update']);
Route::delete('/cupcakes/{id}', [CupCakeController::class, 'destroy']);



