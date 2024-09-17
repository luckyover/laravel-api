<?php

namespace App\Repositories\api;

use App\Repositories\AuthInterface;
use App\Models\User;
class AuthRepository implements AuthInterface
{

    /**
     * find Email
     *
     * @param  string $email
     * @return Collect
     */
    public function findEmail($email){
        return User::where('email',$email)->first();
    }

    /**
    * delete token
    *
    * @param  $request
    * @return Collect
    */
    public function deleteToken($request){
        return $request->user()->tokens()->delete();
    }



}
