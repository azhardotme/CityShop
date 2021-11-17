<?php

use App\Http\Controllers\Backend\SuperAdminController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\UnitController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColorController;
use App\Http\Controllers\Backend\ProductController;
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

//Brand route
Route::resource('/brands', BrandController::class);
Route::get('/brands-status{brand}', [BrandController::class, 'change_status']);


//Unit route
Route::resource('/units', UnitController::class);
Route::get('/unit-status{unit}', [UnitController::class, 'change_status']);

//Size route
Route::resource('/sizes', SizeController::class);
Route::get('/size-status{size}', [SizeController::class, 'change_status']);

//Color route
Route::resource('/colors', ColorController::class);
Route::get('/color-status{color}', [ColorController::class, 'change_status']);


//Product route
Route::resource('/products', ProductController::class);
Route::get('/product-status{product}', [ProductController::class, 'change_status']);
