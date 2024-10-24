<?php

namespace App\Http\Actions\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Exceptions\StoreException;
use Message;
class DeleteAction extends Controller
{

    public function handle($validated){
        $product = Product::where('product_id', $validated['product_id'])->where('del_flg', 0)->first();
        if ($product) {
            // Xóa các trường cần thiết
            $product->del_flg = 1;

            $product->save();

        }else{
            throw new StoreException(
                'Error Validate Store ',
                422,
                null,
                ['errors' => ['product_id' =>[ Message::find(8)]]]
            );
        }


    }
}
