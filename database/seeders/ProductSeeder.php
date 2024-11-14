<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $categoryIds = [1, 2, 3, 4, 6];

        for ($i = 1; $i <= 20; $i++) {

            $image_name = 'product' . $i . '.jpg';

            Storage::fake('public');

            $productData = [
                'name' => $faker->word,
                'image' => $image_name,
            ];

            $product = Product::create($productData);

            $product->category()->attach($categoryIds);

            foreach ($faker->sentences(3) as $description) {
                Feature::create([
                    'product_id' => $product->id,
                    'description' => $description,
                ]);
            }
        }
    }
}
