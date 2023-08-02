<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

// admin login
Route::get('/admin', function(){
    return view('admin/login');
});

// admin dashboard
Route::get('admin/dashboard',[AdminController::class, 'dashboard']);

// admin account management
Route::get('admin/admin-list',[AdminController::class, 'adminList']);
Route::get('admin/admin-add',[AdminController::class, 'adminAdd']);

// admin products management
Route::get('admin/pages/products/product-list',[ProductController::class, 'productList']);
Route::get('admin/pages/products/product-add',[ProductController::class, 'productAdd']);

// admin customers management
Route::get('admin/pages/customers/order-list',[OrderController::class, 'orderList']);


