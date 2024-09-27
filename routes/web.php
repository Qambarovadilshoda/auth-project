<?php

use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;


// Route::group(['middleware' => 'checkAge'], function(){

// });
Route::get('/', [AuthController::class, 'registerForm'])->name('registerForm')->middleware('checkLogout');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handleRegister');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm')->middleware('checkLogout');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/edit', [AuthController::class, 'editProfile'])->name('edit')->middleware('auth');
Route::put('/update/{id}', [AuthController::class, 'updateProfile'])->name('update');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
