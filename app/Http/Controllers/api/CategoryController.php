<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\DeleteCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Actions\Category\CreateAction;
use App\Http\Resources\CommonResource;
use App\Http\Actions\Category\CategoryAction;
use App\Http\Actions\Category\DeleteAction;
use App\Http\Actions\Category\UpdateAction;

class CategoryController extends Controller
{
    /**
     * index get all
     * @param
     * @return Resource
     */
    public function index(Request $request, CategoryAction $action) {
        return new CommonResource($action->handle());
    }

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
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function update(StoreCategoryRequest $request ,UpdateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }

    /**
     * delete
     * @param DeleteCategoryRequest
     * @return Resource
     */
    public function delete(DeleteCategoryRequest $request ,DeleteAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }
}
