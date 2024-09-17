<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\api\AuthRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Message;
class LogoutAction extends Controller
{
    private AuthRepository $authRepository;

    public function __construct(
        AuthRepository $authRepository
    ) {
        $this->authRepository = $authRepository;
    }

    public function handle($request){
        $request->user()->tokens()->delete();
    }
}
