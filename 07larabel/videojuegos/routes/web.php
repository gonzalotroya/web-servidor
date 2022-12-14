<?php

use App\Http\Controllers\CompaniasController;
use App\Http\Controllers\ConsolasController;
use App\Http\Controllers\VideojuegosController;
use Illuminate\Support\Facades\Route;

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
/*
Route::get('/consolas', [ConsolasController::class,'index']);
Route::get('/consolas/create', [ConsolasController::class,'create']);
Route::get('/videojuegos', [VideojuegosController::class,'index']);
Route::get('/videojuegos/create', [VideojuegosController::class,'create']);
*/

Route::get('/consolas/info', function () {
    return view('consolas/info');
});

Route::get('/videojuegos/search',[VideojuegosController::class,'search'])->name('videojuegos.search');
Route::get('/consolas/search',[ConsolasController::class,'search'])->name('consolas.search');
Route::get('/companias/search',[CompaniasController::class,'search'])->name('companias.search');

Route::resource('/videojuegos',VideojuegosController::class);
Route::resource('/companias',CompaniasController::class);
Route::resource('/consolas',ConsolasController::class);