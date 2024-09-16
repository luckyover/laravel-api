<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\HomeController;
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
    Route::middleware('auth:sanctum')->post('/logout',[ApiController::class, 'logout'])->name('logout');
    Route::post('/dashboard', [HomeController::class, 'index'])->name('home');
});


Route::post('/login', [ApiController::class, 'login'])->name('login');
Route::post('/register',[ApiController::class, 'register'])->name('register');

