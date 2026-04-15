<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Wipe the table fresh
        DB::table('products')->truncate();

        // 2. Verified Unsplash IDs for the remaining 17 shoes
        $sneakerImages = [
            '1542291026-7eec264c27ff', '1606107557195-0e29a4b5b4aa', 
            '1600185365483-26d7a4cc7519', '1605348532760-6753d2c43329',
            '1595950653106-6c9ebd614d3a', '1549298916-b41d501d3772',
            '1525966222134-fcfa99b8ae77', '1584735175315-9d5df23860e6',
            '1491553895911-0055eca6402d', '1608231387042-66d1773070a5',
            '1603808033192-082d6919d3e1', 
            'LOCAL_12', // Slot 12
            '1539185441755-769473a23570', '1560769629-975ec94e6a86',
            '1552346154-21d32810aba3', '1514989940723-e8e51635b782',
            'LOCAL_17', // Slot 17
            '1628253747716-0c4f5c90fdda',
            '1511556532299-8f662fc26c06', 
            'LOCAL_20'  // Slot 20
        ];

        $brands = ['Nike', 'Adidas', 'Jordan', 'Puma'];
        $styles = ['"Midnight"', '"Neon"', '"Classic"', '"Retro"', '"Aero"', '"Stealth"'];

        for ($i = 0; $i < 20; $i++) {
            $brand = $brands[array_rand($brands)];
            
            // Logic to determine if we use local files or Unsplash
            if ($i == 11) { 
                $imagePath = "/images/sneaker_12.avif";
            } elseif ($i == 16) { 
                $imagePath = "/images/sneaker_17.avif";
            } elseif ($i == 19) { 
                $imagePath = "/images/sneaker_20.avif";
            } else {
                $imagePath = "https://images.unsplash.com/photo-" . $sneakerImages[$i] . "?auto=format&fit=crop&q=80&w=800";
            }

            Product::create([
                'name' => $brand . " " . $styles[array_rand($styles)] . " " . (2020 + $i),
                'brand' => $brand,
                'price' => rand(9500, 29000),
                'original_price' => rand(30000, 39000),
                'image' => $imagePath,
                'description' => "This premium $brand silhouette merges cinematic heritage with modern daily comfort.",
                'stock' => rand(2, 20),
                'is_featured' => $i < 8 ? true : false,
            ]);
        }
    }
}