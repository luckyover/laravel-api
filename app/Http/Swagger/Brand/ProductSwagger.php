<?php
namespace App\Http\Swagger\Product;
class ProductSwagger {

    /**
     * @OA\Get(
     *     path="/api/product",
     *     summary="Get thông tin product",
     *     security={{"bearerAuth":{}}},
     *     tags={"Product"},
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
     *     path="/api/product/create",
     *     summary="Lưu thông tin product",
     *     security={{"bearerAuth":{}}},
     *     tags={"Product"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="category_id",
     *          description="category_id",
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
     *          name="description",
     *          description="description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="price",
     *          description="price",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="total_sales",
     *          description="total_sales",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="rating",
     *          description="rating",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="image_url",
     *          description="image_url",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="brands",
     *          description="brands",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_title",
     *          description="seo_title",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_description",
     *          description="seo_description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_slug",
     *          description="seo_slug",
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
     *     path="/api/product/update",
     *     summary="Update product",
     *     security={{"bearerAuth":{}}},
     *     tags={"Product"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="product_id",
     *          description="product_id",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
      *     @OA\Parameter(
     *          name="category_id",
     *          description="category_id",
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
     *          name="description",
     *          description="description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="price",
     *          description="price",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="total_sales",
     *          description="total_sales",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="rating",
     *          description="rating",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="image_url",
     *          description="image_url",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="brands",
     *          description="brands",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_title",
     *          description="seo_title",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_description",
     *          description="seo_description",
     *          in="query",
     *          @OA\Schema(type="string", example="")
     *      ),
     *      @OA\Parameter(
     *          name="seo_slug",
     *          description="seo_slug",
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
    public function update() {

    }

     /**
     * @OA\Post(
     *     path="/api/product/delete",
     *     summary="Delete thông tin product",
     *     security={{"bearerAuth":{}}},
     *     tags={"Product"},
     *     @OA\Parameter(ref="#/components/parameters/api_key"),
     *     @OA\Parameter(ref="#/components/parameters/screen_id"),
     *     @OA\Parameter(
     *          name="product_id",
     *          description="product_id",
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



}

