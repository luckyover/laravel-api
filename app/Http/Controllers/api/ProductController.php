<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CommonResource;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\DeleteProductRequest;

use App\Http\Actions\Product\CreateAction;

use App\Http\Actions\Product\ProductAction;
use App\Http\Actions\Product\DeleteAction;
use App\Http\Actions\Product\UpdateAction;


class ProductController extends Controller
{
    //
    /**
     * index get all
     * @param
     * @return Resource
     */
    public function index(ProductAction $action) {
        return new CommonResource($action->handle());
    }

    /**
     * create
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function create(StoreProductRequest $request,CreateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }

    /**
     * update
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function update(StoreProductRequest $request ,UpdateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }

    /**
     * delete
     * @param DeleteCategoryRequest
     * @return Resource
     */
    public function delete(DeleteProductRequest $request ,DeleteAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }
}
