<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::where('iso2_code', 'IT')->first()->id,
            'address_1'  => fake()->streetAddress(),
            'civic' => fake()->buildingNumber(),
            'postcode'   => fake()->postcode(),
            'city'       => fake()->city(),
            'state'      => fake()->stateAbbr(),
            'phone'      => fake()->phoneNumber(),
            'tax_code'   => fake()->regexify('[A-Z|0-9]{11}'),
        ];
    }
}
