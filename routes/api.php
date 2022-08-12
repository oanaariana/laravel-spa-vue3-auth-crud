<?php

use App\Http\Controllers\API\WizkidController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'wizkids', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [WizkidController::class, 'index']);
    Route::post('add', [WizkidController::class, 'add']);
    Route::get('edit/{id}', [WizkidController::class, 'edit']);
    Route::post('update/{id}', [WizkidController::class, 'update']);
    Route::delete('delete/{id}', [WizkidController::class, 'delete']);
});
