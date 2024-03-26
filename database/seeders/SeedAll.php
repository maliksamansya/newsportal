<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SeedAll extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'Admin', 'slug' => 'admin'],
            ['name' => 'Editor','slug' => 'editor'],
            ['name' => 'User',  'slug' => 'user']
        ]);

        User::insert([
            [
                'name'            => 'Mr. Admin',
                'email'           => 'admin@admin.com',
                'password'        => bcrypt('123456'),
                'role_id'         => 1,
                'status'          => 1,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ],
            [
                'name'            => 'Mr. Editor',
                'email'           => 'editor@editor.com',
                'password'        => bcrypt('123456'),
                'role_id'         => 2,
                'status'          => 1,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ],
            [
                'name'            => 'Mr. User',
                'email'           => 'user@user.com',
                'password'        => bcrypt('123456'),
                'role_id'         => 3,
                'status'          => 1,
                'remember_token'  => Str::random(10),
                'created_at'      => date("Y-m-d H:i:s")
            ]
        ]);

        $categories = ['Lifestyle', 'Travel', 'Fashion', 'Sports', 'Technology'];

        foreach ($categories as $index => $category) {
            DB::table('categories')->insert([
                'name' => $category,
                'slug' => Str::slug($category),
                'image' => 'category.jpg',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // todo news
        $json = file_get_contents(database_path('seed_data/all_data.json'));
        $news = json_decode($json, true);
        // news Add default values or modify the data as needed
        foreach ($news as &$item) {
            $item['featured'] = rand(0, 1);
            $item['view_count'] = rand(100, 1000);
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }
        DB::table('news')->insert($news);

        // todo settings
        $json = file_get_contents(database_path('seed_data/settings.json'));
        $settings = json_decode($json, true);
        // settings Add default values or modify the data as needed
        foreach ($settings as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }
        DB::table('settings')->insert($settings);

        // todo advertisements
        $json = file_get_contents(database_path('seed_data/advertisements.json'));
        $advertisements = json_decode($json, true);
        // settings Add default values or modify the data as needed
        foreach ($advertisements as &$item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
        }
        DB::table('advertisements')->insert($advertisements);

        // for ($i = 1; $i <= 9; $i++) {
        //     DB::table('news')->insert([
        //         'title' => "News Title $i",
        //         'slug' => "news-title-$i",
        //         'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         'image' => "avatar5.png",
        //         'category_id' => 1, // Assuming category IDs range from 1 to 5
        //         'status' => 1,
        //         'featured' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // for ($i = 1; $i <= 3; $i++) {
        //     DB::table('news')->insert([
        //         'title' => "News Title $i",
        //         'slug' => "news-title-$i",
        //         'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         'image' => "avatar5.png",
        //         'category_id' => 2, // Assuming category IDs range from 1 to 5
        //         'status' => 1,
        //         'featured' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('news')->insert([
        //         'title' => "News Title $i",
        //         'slug' => "news-title-$i",
        //         'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         'image' => "avatar5.png",
        //         'category_id' => 3, // Assuming category IDs range from 1 to 5
        //         'status' => 1,
        //         'featured' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('news')->insert([
        //         'title' => "News Title $i",
        //         'slug' => "news-title-$i",
        //         'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         'image' => "avatar5.png",
        //         'category_id' => 4, // Assuming category IDs range from 1 to 5
        //         'status' => 1,
        //         'featured' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('news')->insert([
        //         'title' => "News Title $i",
        //         'slug' => "news-title-$i",
        //         'details' => "Details of news $i. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        //         'image' => "avatar5.png",
        //         'category_id' => 5, // Assuming category IDs range from 1 to 5
        //         'status' => 1,
        //         'featured' => rand(0, 1),
        //         'view_count' => rand(100, 1000),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }
    }
}
