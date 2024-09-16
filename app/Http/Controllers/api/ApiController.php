<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
class ApiController extends Controller
{
    /**
     * login
     * @param LoginRequest  
     * @return 
     */
    public function login(LoginRequest $request ) {

        $request->validate();

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return response()->json([
            'token' => $user->createToken('auth-token')->plainTextToken,
        ]);
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
            'name' => $request->name,
            'email' => $request->email,
            'auth_div'=> $request->auth_div,
            'password' => Hash::make($request->password),
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
