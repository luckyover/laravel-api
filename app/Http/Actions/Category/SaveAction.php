<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
use Message;

use function PHPUnit\Framework\returnValue;

class SaveAction extends Controller
{

    public function handle($validated)
{
    // Nếu không có 'id', tạo mới một category
    if (empty($validated['id'])) {

        $slug = Category::where('slug', $validated['slug'])->where('del_flg', 0)->first();

        if ($slug) {
            throw new StoreException(
                'Slug already exists.',
                201, // Mã lỗi 201 Conflict
                null,
                ['errors' => ['slug' => 'The slug has already been taken.']]
            );
        }

        unset($validated['id']);
        $category = new Category($validated);
        $category->del_flg = 0; // Đặt del_flg thành 0
        $category->save();
    } else {
        // Tìm category bằng id
        $category = Category::where('id', $validated['id'])->where('del_flg', 0)->first();

        if ($category ) {
            $slug = Category::where('slug', $validated['slug'])->where('id', '<>', $validated['id']) ->where('del_flg', 0)->first();
            if ($slug) {
                throw new StoreException(
                    'Slug already exists.',
                    201, // Mã lỗi 201 Conflict
                    null,
                    ['errors' => ['slug' => 'The slug has already been taken.']]
                );
            }
            // Cập nhật các trường cần thiết
            $category->name = $validated['name'];
            $category->slug = $validated['slug'];
            $category->seo_title = $validated['seo_title'];
            $category->meta_description = $validated['meta_description'];

            // Lưu các thay đổi vào cơ sở dữ liệu
            $category->save();

        } else {
            throw new StoreException(
                'Error Validate Store',
                201, // Mã lỗi 201 Not Found
                null,
                ['errors' => ['id' => Message::find(8)]]
            );
        }
    }

    return $category;
}
}
