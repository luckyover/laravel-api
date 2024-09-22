<?php

namespace App\Http\Actions\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Exceptions\StoreException;
use Message;
class UpdateAction extends Controller
{

    public function handle($validated){
        $brand = Brand::where('brand_id', $validated['brand_id'])->where('del_flg', 0)->first();


        if(!$brand){
            throw new StoreException(
                'Error Validate Store ',
                201,
                null,
                ['errors' => ['brand_id' => Message::find(8)]]
            );
        }
        // Cập nhật các trường cần thiết

        $brand->brand_nm = $brand->$validated['brand_nm'];
        $brand->address = $brand->$validated['address'];
        $brand->logo_url = $brand->$validated['logo_url'];
        $brand->seo_title = $brand->$validated['seo_title'];
        $brand->seo_description = $brand->$validated['seo_description'];
        $brand->seo_slug = $brand->$validated['seo_slug'];
        $brand->seo_image_alt = $brand->$validated['seo_image_alt'];


        // Lưu các thay đổi vào cơ sở dữ liệu
        $brand->save();
        return $brand;

    }
}
