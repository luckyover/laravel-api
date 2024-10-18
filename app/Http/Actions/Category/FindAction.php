<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
use Message;
class FindAction extends Controller
{

    public function handle($validated){
        $category = Category::where('id', $validated['key'] ?? '')->where('del_flg', 0)->first();
        return  $category;
    }
}
