<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BrandController;
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
Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware('auth:sanctum')->post('/logout',[AuthController::class, 'logout'])->name('logout');

    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/update', [ProductController::class, 'update'])->name('product.update');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/delete', [BrandController::class, 'delete'])->name('brand.delete');
});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register'])->name('register');

