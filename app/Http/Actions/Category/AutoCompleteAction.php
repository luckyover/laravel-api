<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
class AutoCompleteAction extends Controller
{

    public function handle($validated){
        $data = Category::where(function ($query) use ($validated) {
            $key = str_replace(' ', '', strtolower($validated['key']));

            // Kiểm tra nếu `key` không trống, thực hiện tìm kiếm theo `name` hoặc `id`
            if (!empty($key)) {
                $query->whereRaw("REPLACE(LOWER(name), ' ', '') LIKE ?", ['%' . $key . '%'])
                      ->orWhereRaw("CAST(id AS CHAR) LIKE ?", ['%' . $key . '%']);
            }
        })
        ->limit(50) // Giới hạn kết quả trả về tối đa 50 bản ghi
        ->get();
       return $data;
    }
}
