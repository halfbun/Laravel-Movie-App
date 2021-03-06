<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TvController;
use App\Http\Controllers\ActorsController;
use App\Http\Controllers\MoviesController;
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


// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/movie', function () {
//     return view('show');
// });


Route::get('/', [MoviesController::class, 'index']);
Route::get('/movies/{movie}', [MoviesController::class, 'show'])->name('movies.show');;;

Route::get('/actors', [ActorsController::class, 'index'])->name('actors.index');
Route::get('/actors/page/{page}', [ActorsController::class, 'index'])->name('page');
Route::get('/actors/{actor}', [ActorsController::class, 'show'])->name('actors.show');

Route::get('/tv', [TvController::class, 'index']);
Route::get('/tv/{tv}', [TvController::class, 'show'])->name('tv.show');;

// Route::get('/', 'MoviesController@index')->name('index');
// Route::get('/movies/{movie}', 'MoviesController@show')->name('movies.show');
 
