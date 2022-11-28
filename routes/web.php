<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoveController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\MonsterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware'=>'auth'], function() {

    Route::get('/moves', [App\Http\Controllers\MoveController::class, 'index'])->name('moves.index');

    Route::get('/moves/create', [App\Http\Controllers\MoveController::class, 'create'])->name('moves.create');

    Route::get('/moves/show/{move}', [App\Http\Controllers\MoveController::class, 'show'])->name('moves.show');

    Route::post('/moves/store', [App\Http\Controllers\MoveController::class, 'store'])->name('moves.store');


    Route::get('/types', [App\Http\Controllers\TypeController::class, 'index'])->name('types.index');

    Route::get('/types/create', [App\Http\Controllers\TypeController::class, 'create'])->name('types.create');
    
    Route::get('/types/show/{type}', [App\Http\Controllers\TypeController::class, 'show'])->name('types.show');
    
    Route::post('/types/store', [App\Http\Controllers\TypeController::class, 'store'])->name('types.store');


    Route::get('/monsters', [App\Http\Controllers\MonsterController::class, 'index'])->name('monsters.index');

    Route::get('/monsters/create', [App\Http\Controllers\MonsterController::class, 'create'])->name('monsters.create');
    
    Route::get('/monsters/show/{monster}', [App\Http\Controllers\MonsterController::class, 'show'])->name('monsters.show');
    
    Route::post('/monsters/store', [App\Http\Controllers\MonsterController::class, 'store'])->name('monsters.store');


    Route::group(['middleware'=>['auth','role:admin']], function() {

        Route::get('/moves/destroy/{move}', [App\Http\Controllers\MoveController::class, 'destroy'])->name('moves.destroy');

        Route::get('/moves/edit/{move}', [App\Http\Controllers\MoveController::class, 'edit'])->name('moves.edit');

        Route::post('/moves/update/{move}', [App\Http\Controllers\MoveController::class, 'update'])->name('moves.update');


        Route::get('/types/destroy/{type}', [App\Http\Controllers\TypeController::class, 'destroy'])->name('types.destroy');
    
        Route::get('/types/edit/{type}', [App\Http\Controllers\TypeController::class, 'edit'])->name('types.edit');
    
        Route::post('/types/update/{type}', [App\Http\Controllers\TypeController::class, 'update'])->name('types.update');


        Route::get('/monsters/destroy/{monster}', [App\Http\Controllers\MonsterController::class, 'destroy'])->name('monsters.destroy');
    
        Route::get('/monsters/edit/{monster}', [App\Http\Controllers\MonsterController::class, 'edit'])->name('monsters.edit');
    
        Route::post('/monsters/update/{monster}', [App\Http\Controllers\MonsterController::class, 'update'])->name('monsters.update');


        // Monsters - Moves
        Route::get('/monsters/{monster}/moves', [App\Http\Controllers\MonsterController::class, 'editMoves'])->name('monsters.editmoves');

        Route::post('/monsters/{monster}/assignmoves', [App\Http\Controllers\MonsterController::class, 'attachMoves'])->name('monsters.assignmoves');

        Route::post('/monsters/{monster}/detachmoves', [App\Http\Controllers\MonsterController::class, 'detachMoves'])->name('monsters.detachmoves');

    });    

    });

    


    
    /*Route::get('/secret', function () {
        return "Estàs autentificat!!!";
    })->middleware('auth');*/
