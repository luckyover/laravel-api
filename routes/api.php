<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\api\ApiController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'ApiController@login')->name('login');


Route::get('/register', function (Request $request) {

    return response()->json([
        'user' => 'ok',
        'token' => '1',
    ], 201);
});

Route::post('/register', function (RegisterRequest $request) {

    $validated = $request->validated();

    // Tạo người dùng mới
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // Tạo token cho người dùng
    $token = $user->createToken('auth-token')->plainTextToken;

    // Trả về phản hồi với token
    return response()->json([
        'user' => $user,
        'token' => $token,
    ], 201);
});

Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    $request->user()->tokens()->delete();

    return response()->json(['message' => 'Logged out successfully']);
});


