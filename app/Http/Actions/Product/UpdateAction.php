<?php

namespace App\Http\Actions\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Exceptions\StoreException;
use Message;
class UpdateAction extends Controller
{

    public function handle($validated){
        $product = Product::where('product_id', $validated['product_id'])->where('del_flg', 0)->first();
        $category = Product::where('category_id', $validated['category_id'])->where('del_flg', 0)->first();

        if(!$category){
            throw new StoreException(
                'Error Validate Store ',
                201,
                null,
                ['errors' => ['category_id' => Message::find(8)]]
            );
        }
        if(!$product){
            throw new StoreException(
                'Error Validate Store ',
                201,
                null,
                ['errors' => ['product_id' => Message::find(8)]]
            );
        }
        // Cập nhật các trường cần thiết
        $product->name = $validated['name'];
        $product->category_id = $validated['category_id'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->total_sales = $validated['total_sales'];
        $product->rating = $validated['rating'];
        $product->image_url = $validated['image_url'];
        $product->brands = $validated['brands'];
        $product->seo_title = $validated['seo_title'];
        $product->seo_description = $validated['seo_description'];
        $product->seo_slug = $validated['seo_slug'];

        // Lưu các thay đổi vào cơ sở dữ liệu
        $product->save();
        return $product;

    }
}
