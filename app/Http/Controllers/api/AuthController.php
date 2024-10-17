<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Actions\Auth\LoginAction;
use App\Http\Actions\Auth\LogoutAction;
use App\Http\Actions\Auth\RegisterAction;
use App\Http\Resources\CommonResource;
class AuthController extends Controller
{
    /**
     * login
     * @param LoginRequest
     * @return
     */
    public function login(LoginRequest $request , LoginAction $action ) {
        return new CommonResource($action->handle($request->validated()));
    }
    /**
     * logout
     */
    public function logout(Request $request, LogoutAction $action){

        return new CommonResource($action->handle($request));
    }

    /**
     * register
     * @param RegisterRequest
     * @return
     */
    public function register(RegisterRequest $request ,RegisterAction $action) {

        return new CommonResource($action->handle($request->validated()));
    }

}
