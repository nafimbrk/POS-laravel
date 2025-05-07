<?php

namespace Database\Seeders;

use App\Models\TransactionDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'transaction_id' => 2,
                'product_id' => 3,
                'quantity' => 2,
                'price' => 10000,
                'subtotal' => 20000
            ],
        ];

        foreach ($data as $dt) {
            TransactionDetail::create($dt);
        }
    }
}
