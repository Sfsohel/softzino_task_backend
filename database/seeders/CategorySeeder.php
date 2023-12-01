<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                "name" => "category-parent",
                "image" => "parent_category_img.jpg",
                "parent_id" => null,
            ],
            [
                "name" => "category-child-1",
                "image" => "child_category_img.jpg",
                "parent_id" => 1, 
            ],
            [
                "name" => "category-child-2",
                "image" => "child_category_img.jpg",
                "parent_id" => 1, 
            ]
        ]);
    }
}
