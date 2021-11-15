<?php

use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


//Frontend routes
Route::get('/', [HomeController::class, 'index']);


//Backend routes
Route::get('/adminLogin', [AdminController::class, 'index']);
Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'show_dashboard']);
