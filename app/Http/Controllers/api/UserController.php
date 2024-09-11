<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;
/**
 * @OA\Info(title="My API", version="1.0.0")
 */

class UserController extends Controller
{
    //
     /**
     * @OA\Get(
     *     path="/api/user",
     *     summary="Lấy thông tin người dùng",
     *     security={{"bearerAuth":{}}},
     *     tags={"User"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/request_id"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Response(
     *         response=200,
     *         description="Thành công",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function getUser(Request $request) {
        // Ví dụ trả về thông tin người dùng đang đăng nhập
       // return $request->user();
    }
}


