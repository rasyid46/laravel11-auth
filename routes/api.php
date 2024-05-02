<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
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

Route::post('/user', [AuthController::class, 'login']);


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::middleware(['ApiHasAccess'])->group(function () {
        Route::post('me', [AuthController::class,'me']);
        Route::post('logout', [AuthController::class,'logout']);
        Route::post('refresh', [AuthController::class,'refresh']);
    });
});

Route::group(['prefix' => 'todo',], function () {
    Route::middleware(['ApiHasAccess'])->group(function () {
        Route::post('', [TodoController::class, 'createAction']);
        Route::get('', [TodoController::class, 'index']);
        Route::get('/{id}', [TodoController::class, 'readAction']);
        Route::put('/{id}', [TodoController::class, 'updateAction']);
        Route::delete('/{id}', [TodoController::class, 'deleteAction']);
    });
});
