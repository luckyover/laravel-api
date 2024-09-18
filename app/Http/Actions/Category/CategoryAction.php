<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryAction extends Controller
{

    public function handle(){
        $data = Category::where('del_flg', 0)->get();
       return $data;
    }
}
