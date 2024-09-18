<?php

namespace App\Http\Actions\Auth;

use App\Http\Controllers\Controller;

class LogoutAction extends Controller
{

    public function handle($request){
        $request->user()->tokens()->delete();
    }
}
