<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Resources\CommonResource;

use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\DeleteBrandRequest;

use App\Http\Actions\Brand\CreateAction;

use App\Http\Actions\Brand\BrandAction;
use App\Http\Actions\Brand\DeleteAction;
use App\Http\Actions\Brand\UpdateAction;



class BrandController extends Controller
{
    //
    /**
     * index get all
     * @param
     * @return Resource
     */
    public function index(Request $request, BrandAction $action) {
        return new CommonResource($action->handle());
    }

    /**
     * create
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function create(StoreBrandRequest $request,CreateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }

    /**
     * update
     * @param StoreCategoryRequest
     * @return Resource
     */
    public function update(StoreBrandRequest $request ,UpdateAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }

    /**
     * delete
     * @param DeleteCategoryRequest
     * @return Resource
     */
    public function delete(DeleteBrandRequest $request ,DeleteAction $action) {
        return new CommonResource($action->handle($request->validated()));
    }
}
