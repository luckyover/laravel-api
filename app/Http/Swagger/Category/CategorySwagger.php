<?php
namespace App\Http\Swagger\Category;
class CategorySwagger {
     /**
     * @OA\Post(
     *     path="/api/category/create",
     *     summary="Lưu thông tin category",
     *     security={{"bearerAuth":{}}},
     *     tags={"Category"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
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
    public function create() {

    }
}

