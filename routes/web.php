<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

// admin login/logout
Route::get('/admin', [AdminController::class, 'login'])->name('admin-login')->middleware('alreadyLoggedIn');

Route::post('admin/login-process', [AdminController::class, 'loginProcess'])->name('admin-login-process');
// admin logiut
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin-logout');

// admin routes
Route::middleware(['isLoggedIn'])->group(function () {
    // admin dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin-dashboard');

    // admin account management
    Route::get('admin/admin-list', [AdminController::class, 'adminList'])->name('admin-list');
    Route::get('admin/admin-add', [AdminController::class, 'adminAdd'])->name('admin-add');
    Route::post('admin/admin-save', [AdminController::class, 'adminSave'])->name('admin-save');
    Route::get('admin/admin-edit/{id}', [AdminController::class, 'adminEdit'])->name('admin-edit');
    Route::post('admin/admin-update', [AdminController::class, 'adminUpdate'])->name('admin-update');
    Route::get('admin/admin-delete/{id}', [AdminController::class, 'adminDelete'])->name('admin-delete');

    // admin products management
    Route::get('admin/products/product-list', [ProductController::class, 'productList'])->name('product-list');
    Route::get('admin/products/product-add', [ProductController::class, 'productAdd'])->name('product-add');

    // admin category management
    Route::get('admin/categories/category-list', [ProductController::class, 'categoryList'])->name('category-list');
    Route::get('admin/categories/category-add', [ProductController::class, 'categoryAdd'])->name('category-add');

    // admin customers
    Route::get('admin/customers/customer-list', [CustomerController::class, 'customerList'])->name('customer-list');
    Route::get('admin/customers/order-list', [CustomerController::class, 'orderList'])->name('customer-order');
    Route::get('admin/customers/feedback-list', [CustomerController::class, 'feedbackList'])->name('customer-feedback');
    

});