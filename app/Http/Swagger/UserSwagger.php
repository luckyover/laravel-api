<?php
namespace App\Http\Swagger;
class UserSwagger{
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
    public function getUser() {

    }
}

