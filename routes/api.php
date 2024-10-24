<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\common\CommonController;
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
    Route::post('/autocomplete', [CommonController::class, 'autoComplete'])->name('autoComplete');
    Route::post('common/find', [CommonController::class, 'find'])->name('find');


    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/save', [CategoryController::class, 'save'])->name('category.save');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('/category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::post('/category/find', [CategoryController::class, 'find'])->name('category.find');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');
    Route::post('/product/delete', [ProductController::class, 'delete'])->name('product.delete');
    Route::post('/product/search', [ProductController::class, 'search'])->name('product.search');
    Route::post('/product/find', [ProductController::class, 'find'])->name('product.find');

    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::post('/brand/create', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
    Route::post('/brand/delete', [BrandController::class, 'delete'])->name('brand.delete');
});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register'])->name('register');

