<?php

namespace Database\Seeders;

use App\Models\Supply;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SupplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supply = Supply::create([
            'uuid' => Str::random(10),
            'user_id' => User::role(User::RESELLER)->first()->id,
            'amount' => '1936.27',
            'status' => fake()->randomElement(array_keys(Supply::STATUSES))
        ]);

        $supply->rows()->create([
            'product' => json_encode(['id' => 1, 'sku' => 'PROD001', 'name' => 'Prodotto 1', 'um' => 'Pezzi', 'sale_price' => 10, 'purchase_price' => 15]),
            'quantity' => 20,
        ]);
    }
}
