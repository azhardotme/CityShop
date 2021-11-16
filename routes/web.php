<?php

use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


//Frontend routes
Route::get('/', [HomeController::class, 'index']);


//Backend routes
Route::get('/adminLogin', [AdminController::class, 'index']);
Route::get('/dashboard', [SuperAdminController::class, 'dashboard']);
Route::get('/logout', [SuperAdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'show_dashboard']);

//Category route
Route::resource('/categories', CategoryController::class);
Route::get('/category-status{category}', [CategoryController::class, 'change_status']);

//Sub Category route
Route::resource('/sub-categories', SubCategoryController::class);
Route::get('/subcategory-status{subcategory}', [SubCategoryController::class, 'change_status']);
