<?php

namespace App\Http\Actions\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Exceptions\StoreException;
use Message;

class SaveAction extends Controller
{

    public function handle($validated)
    {
        // Nếu không có 'id', tạo mới một Product
        if (empty($validated['product_id'])) {

            $slug = Product::where('s_slug', $validated['s_slug'])->where('del_flg', 0)->first();

            if ($slug) {
                throw new StoreException(
                    'Error Validate Store.',
                    422, // Mã lỗi 201 Conflict
                    null,
                    ['errors' => ['s_slug' => ['The slug has already been taken.']]]
                );
            }

            unset($validated['product_id']);
            $product = new Product($validated);
            $product->del_flg = 0; // Đặt del_flg thành 0
            $product->save();
        } else {
            // Tìm category bằng id
            $product = Product::where('product_id', $validated['product_id'])->where('del_flg', 0)->first();

            if ($product) {
                $slug = Product::where('s_slug', $validated['s_slug'])->where('product_id', '<>', $validated['product_id'])->where('del_flg', 0)->first();
                if ($slug) {
                    throw new StoreException(
                        'Error Validate Store.',
                        422, // Mã lỗi 201 Conflict
                        null,
                        ['errors' => ['s_slug' => ['The slug has already been taken.']]]
                    );
                }
                // Cập nhật các trường cần thiết
                $product->product_nm = $validated['product_nm'];
                $product->category_id = $validated['category_id'];
                $product->description = $validated['description'];
                $product->price = $validated['price'];
                $product->price_sub = $validated['price_sub'];
                $product->qty_sell = $validated['qty_sell'];
                $product->rating = $validated['rating'];
                $product->img = $validated['img'];
                $product->brand_id = $validated['brand_id'];
                $product->s_title = $validated['s_title'];
                $product->m_description = $validated['m_description'];
                $product->s_slug = $validated['s_slug'];

                // Lưu các thay đổi vào cơ sở dữ liệu
                $product->save();
            } else {
                throw new StoreException(
                    'Error Validate Store',
                    201, // Mã lỗi 201 Not Found
                    null,
                    ['errors' => ['product_id' => [Message::find(8)]]]
                );
            }
        }

        return $product;
    }
}
