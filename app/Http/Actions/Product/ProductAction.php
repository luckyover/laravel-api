<?php

namespace App\Http\Actions\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
class ProductAction extends Controller
{

    public function handle(){
        $data = Product::where('del_flg', 0)->get();
       return $data;
    }
}
