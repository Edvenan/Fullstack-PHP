<?php

use App\Http\Controllers\TeamController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [HomeController::class. '__invoke']); is the same as:
Route::get('/', HomeController::class)->name('home');

Route::controller(TeamController::class)->group(function(){
    Route::get('teams'              , 'index')->name('teams.index');
    Route::get('teams/create'       , 'create')->name('teams.create');
    Route::post('teams'             , 'store')->name('teams.store');
    Route::get('teams/show/{team}'  , 'show')->name('teams.show');
    Route::get('teams/showAll'      , 'showAll')->name('teams.showAll');
    Route::get('teams/update/{team}' , 'update')->name('teams.update');
    Route::get('teams/delete/{team}' , 'delete')->name('teams.delete');
});

Route::controller(GameController::class)->group(function(){
    Route::get('games'              , 'index')->name('games.index');
    Route::get('games/create'       , 'create')->name('games.create');
    Route::post('games'             , 'store')->name('games.store');
    Route::get('games/show/{game}'  , 'show')->name('games.show');
    Route::get('games/showAll'      , 'showAll')->name('games.showAll');
    Route::get('games/update/{game}' , 'update')->name('games.update');
    Route::get('games/delete/{game}' , 'delete')->name('games.delete');
});
