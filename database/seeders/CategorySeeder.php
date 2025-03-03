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
        Category::create(
            [
                'name' => 'Web Programming',
                'slug' => 'web-programming',
                'color' => 'red'
            ]
        );

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color' => 'blue'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Artificial Intelligence',
            'slug' => 'artificial-intelligence',
            'color' => 'yellow'
        ]);

        Category::create(
            [
                'name' => 'Data Science',
                'slug' => 'data-science',
                'color' => 'orange'
            ]
        );

        Category::create([
            'name' => 'Mobile Programming',
            'slug' => 'mobile-programming',
            'color' => 'purple'
        ]);

        Category::create([
            'name' => 'Game Mobile',
            'slug' => 'game-mobile',
            'color' => 'fuchsia'
        ]);

        Category::create([
            'name' => 'Game PC',
            'slug' => 'game-pc',
            'color' => 'green'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
            'color' => 'rose'
        ]);

        Category::create([
            'name' => 'Other',
            'slug' => 'other',
            'color' => 'yellow'
        ]);
    }
}
