<?php

namespace App\Http\Actions\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
class BrandAction extends Controller
{

    public function handle(){
        $data = Brand::where('del_flg', 0)->get();
       return $data;
    }
}
