<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Superadmin
        $superadmin = User::factory()
            ->has(
                Address::factory()
                    ->count(2)
                    ->state(new Sequence(
                        ['type' => 'billing'],
                        ['type' => 'shipping'],
                    ))
                    ->state(function (array $attributes) {
                        return ['tax_code' => 'shipping' === $attributes['type'] ? null : $attributes['tax_code']];
                    })
            )
            ->create([
            'firstname' => 'Superadmin',
            'lastname' => null,
            'email' => 'admin@example.test',
            'password' => bcrypt(env('SEEDER_USER_DEFAULT_PASSWORD', 'password')),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $superadmin->assignRole(User::SUPERADMIN);

        // Reseller
        $reseller = User::factory()
            ->has(
                Address::factory()
                    ->count(2)
                    ->state(new Sequence(
                        ['type' => 'billing'],
                        ['type' => 'shipping'],
                    ))
                    ->state(function (array $attributes) {
                        return ['tax_code' => 'shipping' === $attributes['type'] ? null : $attributes['tax_code']];
                    })
            )
            ->create([
                'firstname' => 'Reseller',
                'lastname' => null,
                'email' => 'reseller@example.test',
                'password' => bcrypt(env('SEEDER_USER_DEFAULT_PASSWORD', 'password')),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        $reseller->assignRole(User::RESELLER);

        // Customer
        $customer = User::factory()
            ->has(
                Address::factory()
                    ->count(2)
                    ->state(new Sequence(
                        ['type' => 'billing'],
                        ['type' => 'shipping'],
                    ))
                    ->state(function (array $attributes) {
                        return ['tax_code' => 'shipping' === $attributes['type'] ? null : $attributes['tax_code']];
                    })
            )
            ->create([
                'firstname' => 'Customer',
                'lastname' => null,
                'email' => 'customer@example.test',
                'password' => bcrypt(env('SEEDER_USER_DEFAULT_PASSWORD', 'password')),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        $customer->assignRole(User::CUSTOMER);
    }
}
