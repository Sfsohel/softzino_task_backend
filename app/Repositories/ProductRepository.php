<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function allProducts($request)
    {
        $sort = isset($request->sort) ? $request->sort : null;
        $category_id =  isset($request->category_id) ? $request->category_id : null;
        $product = Product::whereHas('categories', function ($query) use($category_id) {
            if ($category_id) {
                $query->where('categories.id', $category_id);
            }
        })->orderBy('price', $sort)->paginate(10);
        return $product;
    }

    public function storeProduct($data)
    {
        $category_id = $data['category_id'];
        unset($data['category_id']);
        $product = Product::create($data);
        $product->categories()->attach($category_id);
        return $product;
    }
}
