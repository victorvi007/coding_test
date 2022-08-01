<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/',[HomeController::class,'homeShow'])->name('home');
Route::get('/show-data',[HomeController::class,'showData'])->name('show-data');

Route::post('/upload',[HomeController::class,'uploadFile'])->name('upload');
