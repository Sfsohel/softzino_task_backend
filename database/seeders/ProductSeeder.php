<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $category_id = $this->command->choice('Select a category', array_values($categories));
        $selectedCategoryId = array_search($category_id, $categories);
        $product =  Product::create([
            "name"=>"Test product",
            "description"=>"Test",
            "price" => 20,
            "image" => "child_category_img.jpg",
        ]);
        $product->categories()->attach($selectedCategoryId);
    }
}
