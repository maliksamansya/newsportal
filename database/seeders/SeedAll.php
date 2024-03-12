<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    }
}
