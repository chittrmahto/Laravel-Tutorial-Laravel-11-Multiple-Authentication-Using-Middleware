<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user route
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
// admin route
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});
// super admin route
Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
    Route::get('/super-admin/dashboard', [HomeController::class, 'superadminDashboard'])->name('superadmin.dashboard');
});