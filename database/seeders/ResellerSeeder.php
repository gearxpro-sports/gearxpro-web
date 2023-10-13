<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(4)
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
            ->state(new Sequence(
                ['country_id' => 209], // ES
                ['country_id' => 82], // DE
                ['country_id' => 236], // US
                ['country_id' => 14], // AU
            ))
            ->create()
            ->each(function ($user) {
                $user->assignRole('reseller');
            });
    }
}
