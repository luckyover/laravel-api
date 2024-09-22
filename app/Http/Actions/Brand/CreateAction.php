<?php

namespace App\Http\Actions\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
class CreateAction extends Controller
{

    public function handle($validated){
        $brand = new Brand($validated);
        $brand->del_flg = 0;
        $brand->save();
        return $brand;
    }
}
