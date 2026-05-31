<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;

// Redirect root to login
Route::get('/', fn() => redirect()->route('login'));

// Auth routes (guests only)
Route::middleware('guest')->group(function () {
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register.post');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Employee CRUD
    Route::get('/home',             [EmployeeController::class, 'index'])->name('home');
    Route::post('/employees',       [EmployeeController::class, 'store'])->name('employees.store');
    Route::delete('/employees/{id}',[EmployeeController::class, 'destroy'])->name('employees.destroy');
});
