<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
use Message;

class SaveAction extends Controller
{

    public function handle($validated)
{
    // Nếu không có 'id', tạo mới một category
    if (empty($validated['category_id'])) {

        $slug = Category::where('s_slug', $validated['s_slug'])->where('del_flg', 0)->first();

        if ($slug) {
            throw new StoreException(
                'Slug already exists.',
                422, // Mã lỗi 201 Conflict
                null,
                ['errors' => ['s_slug' => ['The slug has already been taken.']]]
            );
        }

        unset($validated['category_id']);
        $category = new Category($validated);
        $category->del_flg = 0; // Đặt del_flg thành 0
        $category->save();
    } else {
        // Tìm category bằng id
        $category = Category::where('category_id', $validated['category_id'])->where('del_flg', 0)->first();

        if ($category ) {
            $slug = Category::where('s_slug', $validated['s_slug'])->where('category_id', '<>', $validated['category_id']) ->where('del_flg', 0)->first();
            if ($slug) {
                throw new StoreException(
                    'Error Validate Store.',
                    201, // Mã lỗi 201 Conflict
                    null,
                    ['errors' => ['s_slug' => ['The slug has already been taken.']]]
                );
            }
            // Cập nhật các trường cần thiết
            $category->category_nm = $validated['category_nm'];
            $category->s_slug = $validated['s_slug'];
            $category->s_title = $validated['s_title'];
            $category->m_description = $validated['m_description'];

            // Lưu các thay đổi vào cơ sở dữ liệu
            $category->save();

        } else {
            throw new StoreException(
                'Error Validate Store',
                422, // Mã lỗi 201 Not Found
                null,
                ['errors' => ['category_id' => [Message::find(8)]]]
            );
        }
    }

    return $category;
}
}
