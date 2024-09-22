<?php

namespace App\Http\Actions\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Exceptions\StoreException;
use Message;
class DeleteAction extends Controller
{

    public function handle($validated){
        $brand = Brand::where('brand_id', $validated['brand_id'])->where('del_flg', 0)->first();
        if ($brand) {
            // Xóa các trường cần thiết
            $brand->del_flg = 1;

            $brand->save();

        }else{
            throw new StoreException(
                'Error Validate Store ',
                201,
                null,
                ['errors' => ['brand_id' => Message::find(8)]]
            );
        }


    }
}
