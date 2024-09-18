<?php
namespace App\Http\Swagger\Auth;
class LoginSwagger {
     /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Đăng nhập",
     *     tags={"Login"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="email",
     *          description="email",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *    @OA\Parameter(
     *          name="password",
     *          description="password",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
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
    public function login() {

    }
}
