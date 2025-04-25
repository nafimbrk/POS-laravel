<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $data = [
            [
                'name' => 'Buku',
                'category_id' => 2,
                'stock' => 20,
                'price' => 20000
            ],
            [
                'name' => 'Kaos',
                'category_id' => 1,
                'stock' => 10,
                'price' => 50000
            ],
            [
                'name' => 'Minyak',
                'category_id' => 6,
                'stock' => 70,
                'price' => 10000
            ],
            [
                'name' => 'Sabun',
                'category_id' => 5,
                'stock' => 100,
                'price' => 25000
            ],
            [
                'name' => 'Roti',
                'category_id' => 6,
                'stock' => 200,
                'price' => 5000
            ],
        ];
        foreach ($data as $dt) {
            Product::create($dt);
        }
    }
}
