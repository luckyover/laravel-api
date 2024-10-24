<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
class SearchAction extends Controller
{

    public function handle($validated){

        $name = $validated['category_nm'] ?? '';

        $page_size = $validated['page_size'] ?? 20;
        $page = $validated['page'] ?? 1;

        // Calculate offset based on the current page
        $offset = ($page - 1) * $page_size;

        // Search and paginate results
        $items = Category::where('category_nm', 'like', "%{$name }%")
            ->where('del_flg', 0)
            ->offset($offset)
            ->limit($page_size)
            ->get();

        // Get the total count of items for the query
        $total = Category::where('category_nm', 'like', "%{$name}%")->where('del_flg', 0)->count();

        return [
            'data' => $items,
            'pagination' => [
                'total' => $total,
                'page_size' => $page_size,
                'page' => $page,
            ]

        ];
    }
}
