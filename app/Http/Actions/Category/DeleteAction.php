<?php

namespace App\Http\Actions\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Exceptions\StoreException;
use Message;
class DeleteAction extends Controller
{

    public function handle($validated){
        $category = Category::where('id', $validated['id'])->where('del_flg', 0)->first();
        if ($category) {
            // Xóa các trường cần thiết
            $category->del_flg = 1;

            $category->save();

        }else{
            throw new StoreException(
                'Error Validate Store ',
                201,
                null,
                ['errors' => ['id' => Message::find(8)]]
            );
        }


    }
}
