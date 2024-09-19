<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
class CreateAction extends Controller
{

    public function handle($validated){
        $category = new Category($validated);
        $category->del_flg = 0;
        $category->save();
        return $category;
    }
}
