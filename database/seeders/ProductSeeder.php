<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Nike Air Force 1',
            'brand' => 'Nike',
            'price' => 12999,
            'original_price' => 15999,
            'image' => 'https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?auto=format&fit=crop&w=500&q=60',
            'description' => 'The Nike Air Force 1 is a classic sneaker that has been a staple in streetwear culture for decades. With its timeless design and comfortable fit, it continues to be a favorite among sneaker enthusiasts.',
            'stock' => 50,
        ]);
        
        Product::create([
            'name' => 'Adidas Ultraboost',
            'brand' => 'Adidas',
            'price' => 14999,
            'original_price' => 18999,
            'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=60',
            'description' => 'The Adidas Ultraboost is known for its exceptional comfort and performance. Featuring Boost cushioning technology, it provides energy return with every step, making it ideal for both casual wear and athletic activities.',
            'stock' => 30,
        ]);

        Product::create([
            'name' => 'Jordan Retro 4',
            'brand' => 'Jordan',
            'price' => 19999,
            'original_price' => 24999,
            'image' => 'https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&w=500&q=60',
            'description' => 'The Jordan Retro 4 is a legendary sneaker that pays homage to the original design released in 1989. With its iconic silhouette and premium materials, it remains a must-have for sneaker collectors and basketball fans alike.',
            'stock' => 20,
        ]);
    }
}
