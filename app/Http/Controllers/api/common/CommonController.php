<?php

namespace App\Http\Controllers\api\common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Actions\Category\AutoCompleteAction;
use App\Http\Actions\Category\FindAction;
use App\Http\Resources\CommonResource;
use App\Exceptions\StoreException;
use App\Http\Requests\Common\AutoCompleteRequest;
class CommonController extends Controller
{
    /**
     * login
     * @param AutoCompleteRequest
     * @return
     */
    public function autoComplete(AutoCompleteRequest $request ) {
        $validated = $request->validated();
        $actions = [
            'category' => AutoCompleteAction::class,
        ];

        if (!array_key_exists($validated['screen'], $actions)) {
            throw new StoreException('Invalid screen specified.', 400);
        }

        $action = new $actions[$validated['screen']];

        return new CommonResource($action->handle($validated));

    }
    /**
     * find
     * @param AutoCompleteRequest
     * @return
     */
    public function find(AutoCompleteRequest $request ) {
        $validated = $request->validated();
        $actions = [
            'category' => FindAction::class,
        ];

        if (!array_key_exists($validated['screen'], $actions)) {
            throw new StoreException('Invalid screen specified.', 400);
        }

        $action = new $actions[$validated['screen']];

        return new CommonResource($action->handle($validated));

    }


}
