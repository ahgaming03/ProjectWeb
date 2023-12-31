<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
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
    Route::get('admin/admin-edit/{id}', [AdminController::class, 'adminEdit'])->name('admin-edit');
    Route::post('admin/admin-update', [AdminController::class, 'adminUpdate'])->name('admin-update');
    Route::get('admin/admin-delete/{id}', [AdminController::class, 'adminDelete'])->name('admin-delete');
    // profile
    Route::post('admin/admin-upload-image', [AdminController::class, 'uploadImage'])->name('admin-upload-image');
    Route::get('admin/profile', [AdminController::class, 'profile'])->name('admin-profile');
    Route::post('admin/change-password', [AdminController::class, 'changePassword'])->name('admin-change-password');

    // roles management
    Route::get('admin/roles/role-list', [RoleController::class, 'roleList'])->name('role-list');
    Route::get('admin/roles/role-add', [RoleController::class, 'roleAdd'])->name('role-add');
    Route::post('admin/roles/role-save', [RoleController::class, 'roleSave'])->name('role-save');
    Route::get('admin/roles/role-edit/{id}', [RoleController::class, 'roleEdit'])->name('role-edit');
    Route::post('admin/role-update', [RoleController::class, 'roleUpdate'])->name('role-update');
    Route::get('admin/roles/role-delete/{id}', [RoleController::class, 'roleDelete'])->name('role-delete');

    // products management
    Route::get('admin/products/product-list', [ProductController::class, 'productList'])->name('product-list');
    Route::get('admin/products/product-add', [ProductController::class, 'productAdd'])->name('product-add');
    Route::post('admin/products/product-save', [ProductController::class, 'ProductSave'])->name('product-save');
    Route::get('admin/products/product-edit/{id}', [ProductController::class, 'productEdit'])->name('product-edit');
    Route::post('admin/products/product-update', [ProductController::class, 'productUpdate'])->name('product-update');
    Route::get('admin/products/product-delete/{id}', [ProductController::class, 'productDelete'])->name('product-delete');
    Route::delete('admin/products/delete-delete-Image/{id}', [ProductController::class, 'deleteImage'])->name('delete-image');
    Route::delete('admin/products/delete-delete-cover/{id}', [ProductController::class, 'deleteCover'])->name('delete-cover');

    // categories management
    Route::get('admin/categories/category-list', [CategoryController::class, 'categoryList'])->name('category-list');
    Route::get('admin/categories/category-add', [CategoryController::class, 'categoryAdd'])->name('category-add');
    Route::post('admin/categories/category-save', [CategoryController::class, 'categorySave'])->name('category-save');
    Route::get('admin/categories/category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('category-edit');
    Route::post('admin/categories/category-update', [CategoryController::class, 'categoryUpdate'])->name('category-update');
    Route::get('admin/categories/category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category-delete');

    // manufacturers management
    Route::get('admin/manufacturers/manufacturer-list', [ManufacturerController::class, 'manufacturerList'])->name('manufacturer-list');
    Route::get('admin/manufacturers/manufacturer-add', [ManufacturerController::class, 'manufacturerAdd'])->name('manufacturer-add');
    Route::post('admin/manufacturers/manufacturer-save', [ManufacturerController::class, 'manufacturerSave'])->name('manufacturer-save');
    Route::get('admin/manufacturers/manufacturer-edit/{id}', [ManufacturerController::class, 'manufacturerEdit'])->name('manufacturer-edit');
    Route::post('admin/manufacturers/manufacturer-update', [ManufacturerController::class, 'manufacturerUpdate'])->name('manufacturer-update');
    Route::get('admin/manufacturers/manufacturer-delete/{id}', [ManufacturerController::class, 'manufacturerDelete'])->name('manufacturer-delete');

    // customers management
    Route::get('admin/customers/customer-list', [CustomerController::class, 'customerList'])->name('customer-list');
    Route::get('admin/customer-delete/{id}', [CustomerController::class, 'customerDelete'])->name('customer-delete');

    // feedbacks management
    Route::get('admin/customers/feedback-list', [CustomerController::class, 'feedbackList'])->name('customer-feedback');

    // orders management
    Route::get('admin/orders/order-list', [OrderController::class, 'orderList'])->name('order-list');
    Route::get('admin/orders/order-detail/{id}', [OrderController::class, 'orderDetail'])->name('order-detail');
    Route::get('admin/orders/order-delete/{id}', [OrderController::class, 'orderDelete'])->name('order-delete');

});


/**
 * customer
 */
// dashboard
Route::get('/', [CustomerController::class, 'index'])->name('customer-index');

// login/register/logout
Route::get('/login', [CustomerController::class, 'login'])->name('customer-login')->middleware('alreadyLoggedIn');
Route::post('/login-process', [CustomerController::class, 'loginProcess'])->name('customer-login-process');
Route::get('/register', [CustomerController::class, 'register'])->name('customer-register')->middleware('alreadyLoggedIn');
Route::post('/register-process', [CustomerController::class, 'registerProcess'])->name('customer-register-process');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer-logout');

// login with 
Route::get('/login/{provider}/redirect', [ProviderController::class, 'redirect']);
Route::get('/login/{provider}/callback', [ProviderController::class, 'callback']);

// customer profile
Route::get('/profiles/profile', [CustomerController::class, 'profile'])->name('customer-profile');
Route::post('/customer-update', [CustomerController::class, 'customerUpdate'])->name('customer-update');
Route::post('/customer-save', [CustomerController::class, 'customerSave'])->name('customer-save');
Route::post('/change-password', [CustomerController::class, 'changePassword'])->name('change-password');
Route::post('/customer-upload-image', [CustomerController::class, 'uploadImage'])->name('upload-image');

// customer view product
Route::get('/', [ProductController::class, 'index'])->name('product-index');
Route::get('/products/{id}', [ProductController::class, 'productDetails'])->name('product-detail');

// search
Route::get('/search', [SearchController::class, 'search'])->name('web.search');

// carts
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('remove-from-cart/{id}', [ProductController::class, 'removeFromCart'])->name('remove-from-cart');
Route::post('cart-update', [ProductController::class, 'cartUpdate'])->name('cart-update');
Route::get('cart-info-order', [ProductController::class, 'cartInfoOrder'])->name('cart-info-order');
Route::post('checkout', [ProductController::class, 'checkout'])->name('checkout');