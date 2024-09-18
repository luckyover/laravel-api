<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Actions\Category\CreateAction;
use App\Http\Resources\CommonResource;

class CategoryController extends Controller
{

    /**
     * create
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function create(StoreCategoryRequest $request,CreateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }
    /**
     * update
     * @param LoginRequest
     * @return Resource
     */
    public function update() {

    }
    /**
     * delete
     * @param LoginRequest
     * @return Resource
     */
    public function delete() {

    }
}
