<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(20)
            ->has(
                Address::factory()
                    ->count(2)
                    ->state(new Sequence(
                        ['type' => 'invoice'],
                        ['type' => 'delivery'],
                    ))
                    ->state(function (array $attributes) {
                        return ['tax_code' => 'delivery' === $attributes['type'] ? null : $attributes['tax_code']];
                    })
            )
            ->create()
            ->each(function ($user) {
                $user->assignRole('customer');
            });
        ;
    }
}
