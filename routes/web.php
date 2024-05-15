<?php

use App\Http\Resources\UserResource;
use App\Http\Resources\CupCakeResource;
use App\Models\User;
use App\Models\CupCake;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CupCakeController;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::get('/test', function() {
    // $user = User::first();
    // $user->load('orders');
    //return UserResource::collection(User::paginate(3));
    // return new UserResource($user);
    // return $user;
    // $cupCakes = CupCake::all();`
    $cupCakes = CupCake::all();
    return CupCakeResource::collection($cupCakes);
});
Route::delete('/cupcakes/{id}', [CupCakeController::class, 'destroy']);

require __DIR__.'/auth.php';
