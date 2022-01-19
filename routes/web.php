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
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\CheckoutController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;



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

//Add to Cart Route
Route::post('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::get('/delete-cart/{id}', [CartController::class, 'delete']);

//Checkout route
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::get('/login-check', [CheckoutController::class, 'login_check']);
Route::post('/save-shipping-address', [CheckoutController::class, 'save_shipping_address']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);

//Manage orders...
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{id}', [OrderController::class, 'view_order']);


//Customer Login,Registration & logout routes
Route::post('/customer-login', [CustomerController::class, 'login']);
Route::post('/customer-registration', [CustomerController::class, 'registration']);
Route::get('/customer-logout', [CustomerController::class, 'logout']);

//Frontend routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/view_product/{id}', [HomeController::class, 'view_details']);
Route::get('/product_by_cat/{id}', [HomeController::class, 'product_by_cat']);
Route::get('/product_by_subcat/{id}', [HomeController::class, 'product_by_subcat']);

Route::fallback(function () {
    return view('error');
});
