<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cakes', [CakeController::class, 'index']);
Route::post('/cakes', [CakeController::class, 'store']);
Route::get('/cake/{id}', [CakeController::class, 'show']);
Route::delete('/cake/{id}', [CakeController::class, 'destroy']);
Route::put('/cake/{id}', [CakeController::class, 'update']);
