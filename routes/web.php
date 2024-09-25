<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'registerForm'])->name('registerForm');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('handleRegister');
Route::get('/login', [AuthController::class, 'loginForm'])->name('loginForm');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handleLogin');
Route::get('/edit', [AuthController::class, 'editProfile'])->name('edit');
Route::put('/update/{id}', [AuthController::class, 'updateProfile'])->name('update');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard/{id}', [AuthController::class, 'dashboard'])->name('dashboard');
