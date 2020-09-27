<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use Database\Factories\ProductImagesFactory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(20)
            ->has(Category::factory()->count(2))
            ->hasImages(1)
            ->create();
    }
}
