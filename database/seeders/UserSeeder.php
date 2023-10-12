<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Superadmin
        $superadmin = User::create([
            'name' => 'Superadmin',
            'email' => 'admin@example.test',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $superadmin->assignRole(Role::findByName('superadmin'));

        // Reseller
        $reseller = User::create([
            'name' => 'Reseller',
            'email' => 'reseller@example.test',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $reseller->assignRole(Role::findByName('reseller'));

        // Customer
        $customer = User::create([
            'name' => 'Customer',
            'email' => 'customer@example.test',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $customer->assignRole(Role::findByName('customer'));
    }
}
