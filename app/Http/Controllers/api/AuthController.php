<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Actions\Auth\LoginAction;
use App\Http\Actions\Auth\LogoutAction;
use Message;
use App\Http\Resources\Auth\LoginResource;
class AuthController extends Controller
{
    /**
     * login
     * @param LoginRequest
     * @return
     */
    public function login(LoginRequest $request , LoginAction $action ) {

        return new LoginResource($action->handle($request->validated()));
    }
    /**
     * logout
     */
    public function logout(Request $request, LogoutAction $action){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }
    /**
     * register
     * @param RegisterRequest
     * @return
     */
    public function register(RegisterRequest $request ) {
        $validated = $request->validated();
        // Tạo người dùng mới
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'auth_div'=> $validated['auth_div'],
            'password' => Hash::make($validated['password']),
        ]);

        // Tạo token cho người dùng
        $token = $user->createToken('auth-token')->plainTextToken;

        // Trả về phản hồi với token
        return response()->json([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

}
