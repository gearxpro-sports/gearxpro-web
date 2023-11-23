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
            GroupAttributeWithAttributeSeeder::class,
        ]);

        if(app()->environment() === 'local') {
            $this->call([
                ResellerSeeder::class,
                CustomerSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                StockSeeder::class,
                OrderSeeder::class
            ]);
        }
    }
}
