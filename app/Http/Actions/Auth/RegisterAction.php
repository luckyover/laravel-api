<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class RegisterAction extends Controller
{

    public function handle( $validated){

        $user = new User($validated);
        $user->password = Hash::make($validated['password']);
        $user->save();

        // Tạo token cho người dùng
        $token = $user->createToken('auth-token')->plainTextToken;
        $data['user'] = $user;
        $data['token'] = $token;
        return $data;
    }
}
