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
        $data = [
            ['name' => 'Peralatan mandi'],
            ['name' => 'Peralatan masak'],
            ['name' => 'Makanan'],
            ['name' => 'Munuman'],
            ['name' => 'Bumbu dapur'],
            ['name' => 'Pakaian'],
            ['name' => 'Aksesoris']
        ];
        foreach ($data as $dt) {
            Category::create($dt);
        }
    }
}
