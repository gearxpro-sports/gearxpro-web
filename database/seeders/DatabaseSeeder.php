<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            CountrySeeder::class,
            UserSeeder::class,
            ResellerSeeder::class,
            CustomerSeeder::class,
            GroupAttributeWithAttributeSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            StockSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
