<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Exceptions\StoreException;
class RegisterAction extends Controller
{

    public function handle( $validated){
        if(($validated['2FA'] ?? '') === '28031999'){
            $user = new User($validated);
            $user->password = Hash::make($validated['password']);
            $user->save();

            // Tạo token cho người dùng
            $token = $user->createToken('auth-token')->plainTextToken;
            $data['user'] = $user;
            $data['token'] = $token;
            return $data;
        }else{
            throw new StoreException('Error Register.', 201);
        }

    }
}
