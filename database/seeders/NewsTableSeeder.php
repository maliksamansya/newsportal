<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 2; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => "Category $i",
                'slug' => "category-$i",
                'image' => "category.jpg",
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= 9; $i++) {
            DB::table('news')->insert([
                'title' => "News Title $i",
                'slug' => "news-title-$i",
                'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'image' => "avatar5.png",
                'category_id' => 6, // Assuming category IDs range from 1 to 5
                'status' => 1,
                'featured' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= 3; $i++) {
            DB::table('news')->insert([
                'title' => "News Title $i",
                'slug' => "news-title-$i",
                'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'image' => "avatar5.png",
                'category_id' => 7, // Assuming category IDs range from 1 to 5
                'status' => 1,
                'featured' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            DB::table('news')->insert([
                'title' => "News Title $i",
                'slug' => "news-title-$i",
                'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
                'image' => "avatar5.png",
                'category_id' => 3, // Assuming category IDs range from 1 to 5
                'status' => 1,
                'featured' => rand(0, 1),
                'view_count' => rand(100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
