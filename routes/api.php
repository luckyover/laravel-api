<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\HomeController;
use App\Http\Controllers\api\CategoryController;
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

    Route::post('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::post('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register',[AuthController::class, 'register'])->name('register');

