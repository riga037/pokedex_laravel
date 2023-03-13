<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group( function () {
    
    Route::resource('/monsters',App\Http\Controllers\api\monstersController::class);
    Route::get('/allmonsters',[App\Http\Controllers\api\monstersController::class , 'index2']);

    Route::resource('/types',App\Http\Controllers\api\typesController::class);
    Route::resource('/moves',App\Http\Controllers\api\movesController::class);
    
});

Route::get('/login', function() {
    return "Has de validar-te";
})->name('login');


