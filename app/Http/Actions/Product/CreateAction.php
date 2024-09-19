<?php

namespace App\Http\Actions\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
class CreateAction extends Controller
{

    public function handle($validated){
        $product = new Product($validated);
        $product->del_flg = 0;
        $product->save();
        return $product;
    }
}
