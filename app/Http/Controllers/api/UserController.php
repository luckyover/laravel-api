<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function getUser(Request $request) {
        // Ví dụ trả về thông tin người dùng đang đăng nhập
       // return $request->user();
    }
}


