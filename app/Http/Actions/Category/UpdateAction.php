<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
class UpdateAction extends Controller
{

    public function handle($validated){
        $category = Category::where('id', $validated['id'])->where('del_flg', 0)->first();
        if ($category) {
            // Cập nhật các trường cần thiết
            $category->name = $validated['name'];
            $category->slug = $validated['slug'];
            $category->seo_title = $validated['seo_title'];
            $category->meta_description = $validated['meta_description'];

            // Lưu các thay đổi vào cơ sở dữ liệu
            $category->save();
            return $category;

        }else{
            throw new StoreException(
                'Something went wrong!',
                501,
                null,
                ''
            );
        }


    }
}
