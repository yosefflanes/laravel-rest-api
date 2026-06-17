<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop ASUS',
                'price' => 8500000,
                'description' => 'Laptop untuk kebutuhan coding dan daily use',
            ],
            [
                'name' => 'Mouse Logitech',
                'price' => 250000,
                'description' => 'Mouse wireless ergonomis',
            ],
            [
                'name' => 'Keyboard Mechanical',
                'price' => 750000,
                'description' => 'Keyboard switch blue, RGB backlight',
            ],
            [
                'name' => 'Monitor 24 inch',
                'price' => 1800000,
                'description' => 'Monitor Full HD IPS panel',
            ],
            [
                'name' => 'Headset Gaming',
                'price' => 450000,
                'description' => 'Headset dengan noise cancelling',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
