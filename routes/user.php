<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/user',[UserController::class,'index'])->name('user.list');
Route::get('/user/{id}',[UserController::class,'show'])->name('user.show');
Route::post('/user',[UserController::class,'store'])->name('user.store');
Route::put('/user/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/user/{id}',[UserController::class,'destroy'])->name('user.delete');
