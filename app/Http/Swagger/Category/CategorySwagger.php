<?php
namespace App\Http\Swagger\Category;
class CategorySwagger {

    /**
     * @OA\Get(
     *     path="/api/category",
     *     summary="Get thông tin category",
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
    public function index() {

    }

     /**
     * @OA\Post(
     *     path="/api/category/create",
     *     summary="Lưu thông tin category",
     *     security={{"bearerAuth":{}}},
     *     tags={"Category"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="name",
     *          description="name",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Parameter(
     *          name="slug",
     *          description="slug",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Parameter(
     *          name="meta_description",
     *          description="meta_description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_title",
     *          description="seo_title",
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
    public function create() {

    }

    /**
     * @OA\Post(
     *     path="/api/category/update",
     *     summary="Update category",
     *     security={{"bearerAuth":{}}},
     *     tags={"Category"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="id",
     *          description="id",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          description="name",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Parameter(
     *          name="slug",
     *          description="slug",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Parameter(
     *          name="meta_description",
     *          description="meta_description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_title",
     *          description="seo_title",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *     @OA\Response(
     *         response=200,
     *
     *         description="Thành công",
     *          @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="errors", type="array", @OA\Items(type="string")),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(property="key1", type="string"),
 *                 @OA\Property(property="key2", type="integer")
 *             )
 *         )
 *     )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function update() {

    }

     /**
     * @OA\Post(
     *     path="/api/category/delete",
     *     summary="Delete thông tin category",
     *     security={{"bearerAuth":{}}},
     *     tags={"Category"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="id",
     *          description="id",
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
    public function delete() {

    }

       /**
     * @OA\Post(
     *     path="/api/category/search",
     *     summary="Search thông tin category",
     *     security={{"bearerAuth":{}}},
     *     tags={"Category"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="name",
     *          description="Name",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *    @OA\Parameter(
     *          name="page_size",
     *          description="Page size",
     *          in="query",
     *          @OA\Schema(type="number", example=10)
     *      ),
     *    @OA\Parameter(
     *          name="page",
     *          description="Page",
     *          in="query",
     *          @OA\Schema(type="number",example=1)
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

    public function search(){

    }


}

