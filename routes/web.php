<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * admin role
 */

// admin login/logout
Route::get('admin', [AdminController::class, 'login'])->name('admin-login');
Route::post('admin/login-process', [AdminController::class, 'loginProcess'])->name('admin-login-process');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

// admin logged in
Route::middleware(['isLoggedIn'])->group(function () {
    // admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    // admin account management
    Route::get('admin/admin-list', [AdminController::class, 'adminList'])->name('admin-list');
    Route::get('admin/admin-add', [AdminController::class, 'adminAdd'])->name('admin-add');
    Route::post('admin/admin-save', [AdminController::class, 'adminSave'])->name('admin-save');
    Route::get('admin/admin-edit/{id}', [AdminController::class, 'adminEdit']);
    Route::post('admin/admin-update', [AdminController::class, 'adminUpdate'])->name('admin-update');
    Route::get('admin/admin-delete/{id}', [AdminController::class, 'adminDelete'])->name('admin-delete');

    // admin upload image
    Route::post('admin/admin-upload-image', [AdminController::class, 'uploadImage'])->name('upload-image');

    // admin profile
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin-profile');

    // admin change password
    Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('change-password');

    // admin products management
    Route::get('admin/products/product-list', [ProductController::class, 'productList'])->name('product-list');
    Route::get('admin/products/product-add', [ProductController::class, 'productAdd'])->name('product-add');
    Route::post('admin/products/product-save', [ProductController::class, 'ProductSave'])->name('product-save');
    Route::get('admin/products/product-edit/{id}', [ProductController::class, 'productEdit'])->name('product-edit');
    Route::post('admin/products/product-update', [ProductController::class, 'productUpdate'])->name('product-update');
    Route::get('admin/products/product-delete/{id}', [ProductController::class, 'productDelete'])->name('product-delete');

    // admin category management
    Route::get('admin/categories/category-list', [CategoryController::class, 'categoryList'])->name('category-list');
    Route::get('admin/categories/category-add', [CategoryController::class, 'categoryAdd'])->name('category-add');
    Route::post('admin/categories/category-save', [CategoryController::class, 'categorySave'])->name('category-save');
    Route::get('admin/categories/category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category-edit');
    Route::post('admin/categories/category-update', [CategoryController::class, 'categoryUpdate'])->name('category-update');
    Route::get('admin/categories/category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category-delete');

    // admin manufacturer management
    Route::get('admin/manufacturers/manufacturer-list', [ManufacturerController::class, 'manufacturerList'])->name('manufacturer-list');
    Route::get('admin/manufacturers/manufacturer-add', [ManufacturerController::class, 'manufacturerAdd'])->name('manufacturer-add');
    Route::post('admin/manufacturers/manufacturer-save', [ManufacturerController::class, 'manufacturerSave'])->name('manufacturer-save');
    Route::get('admin/manufacturers/manufacturer-edit/{id}', [ManufacturerController::class, 'manufacturerEdit'])->name('manufacturer-edit');
    Route::post('admin/manufacturers/manufacturer-update', [ManufacturerController::class, 'manufacturerUpdate'])->name('manufacturer-update');
    Route::get('admin/manufacturers/manufacturer-delete/{id}', [ManufacturerController::class, 'manufacturerDelete'])->name('manufacturer-delete');

    // admin customers
    Route::get('admin/customers/customer-list', [CustomerController::class, 'customerList'])->name('customer-list');

    Route::get('admin/customers/order-list', [OrderController::class, 'orderList'])->name('customer-order');

    Route::get('admin/customers/feedback-list', [CustomerController::class, 'feedbackList'])->name('customer-feedback');

    //order
    Route::get('admin/orders/order-list', [OrderController::class, 'orderList'])->name('order-list');
    Route::get('admin/orders/order-delete/{id}', [OrderController::class, 'orderDelete'])->name('order-delete');
    Route::get('admin/orders/order-detail/{id}', [OrderController::class, 'orderDetail'])->name('order-detail');
});


// customer template 
Route::get('/', [CustomerController::class, 'index'])->name('customer-index');
Route::get('/login', [CustomerController::class, 'login'])->name('customer-login');
Route::post('/login-process', [CustomerController::class, 'loginProcess'])->name('customer-login-process');
Route::get('/register', [CustomerController::class, 'register'])->name('customer-register');
Route::post('/register-process', [CustomerController::class, 'registerProcess'])->name('customer-register-process');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer-logout');

// customer profile
Route::get('customer/pages/profiles/profile', [CustomerController::class, 'profile'])->name('customer-profile');
Route::post('customer/pages/profiles/customer-edit', [CustomerController::class, 'customerEdit'])-> name('customer-edit');
Route::post('customer/pages/profiles/customer-save', [CustomerController::class, 'customerSave'])->name('customer-save');

