<?php

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


Route::get('/',[\App\Http\Controllers\MoviesController::class,'index'])->name('movies');

Route::get('/movies/{movies}',[\App\Http\Controllers\MoviesController::class,'show'])->name('movies.show');
