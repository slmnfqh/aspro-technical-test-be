<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // call the seeders class in order
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);


        Post::factory(50)->recycle([
            User::all(),
            Category::all(),
        ])->create();

        Project::factory(50)->recycle([
            User::all(),
            Category::all(),
        ])->create();
    }
}
