<?php

use App\Http\Controllers\actividadesController;
use App\Http\Controllers\loginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('validateUser', [loginController::class, 'validateUser']);
    Route::post('createUser', [loginController::class, 'createUser']);
});

Route::group([
    'prefix' => 'activities'
], function ($router) {
    Route::post('getActivities', [actividadesController::class, 'getActivities']);
    Route::post('update', [actividadesController::class, 'update']);
    Route::get('delete', [actividadesController::class, 'delete']);
    Route::post('save', [actividadesController::class, 'save']);
});
