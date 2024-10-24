<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
use Message;
class FindAction extends Controller
{

    public function handle($validated){
        return is_numeric($validated['key'] ?? null)
        ? Category::where('category_id', (int) $validated['key'])->where('del_flg', 0)->first()
        : null;
    }
}
