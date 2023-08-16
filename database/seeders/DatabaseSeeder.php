<?php

namespace Database\Seeders;


use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Provider;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(10)->create();
        Category::factory()
        ->count(10)
        ->create();
        Provider::factory()
        ->count(10)
        ->create();
        Product::factory()
        ->count(50)
        ->create();

    }
}
