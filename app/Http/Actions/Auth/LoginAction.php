<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\api\AuthRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Message;
class LoginAction extends Controller
{
    private AuthRepository $authRepository;

    public function __construct(
        AuthRepository $authRepository
    ) {
        $this->authRepository = $authRepository;
    }

    public function handle($validated){
        $user = $this->authRepository->findEmail($validated['email']);
        if (! $user || ! Hash::check($validated['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => Message::find(1),
            ]);
        }

        if ($user->auth_div != 1) {
            throw ValidationException::withMessages([
                'auth_div' => Message::find(2),
            ]);
        }
        $data['token'] =  $user->createToken('auth-token')->plainTextToken;
        return  $data;
    }
}
