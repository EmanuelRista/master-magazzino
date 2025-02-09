<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotte pubbliche (non richiedono autenticazione)
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/register', [UserController::class, 'register'])->name('register');

// Rotte che richiedono autenticazione
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', [UserController::class, 'getUser'])->name('user');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/user-profile', [UserController::class, 'getUserProfile'])->name('user.profile');

    // CRUD routes for Products
    Route::apiResource('products', ProductController::class);

    // CRUD routes for Categories
    Route::apiResource('categories', CategoryController::class);

    // CRUD routes for Suppliers
    Route::apiResource('suppliers', SupplierController::class);

    // CRUD routes for Orders
    Route::apiResource('orders', OrderController::class);

    // CRUD routes for Order Details
    Route::apiResource('order-details', OrderDetailController::class);
});
