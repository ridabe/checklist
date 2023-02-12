<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\InterestedController;


Route::apiResource('/cakes', CakeController::class);
Route::get('/cake/{id}', [CakeController::class, 'show']);
Route::delete('/cake/{id}', [CakeController::class, 'destroy']);
Route::put('/cake/{id}', [CakeController::class, 'update']);

//Rotas interested

Route::apiResource('/interesteds', InterestedController::class);
// Route::get('/interesteds', [InterestedController::class, 'index']);
Route::get('/interested/{id}', [InterestedController::class, 'show']);
Route::delete('/interested/{id}', [InterestedController::class, 'destroy']);
Route::put('/interested/{id}', [InterestedController::class, 'update']);
