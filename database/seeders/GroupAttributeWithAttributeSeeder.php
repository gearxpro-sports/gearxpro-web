<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\GroupAttribute;
use Illuminate\Database\Seeder;

class GroupAttributeWithAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lengthsGroup = GroupAttribute::create([
            'name' => 'Lughezza',
            'options_type' => 'select',
            'position' => 0,
        ]);

        $lengthsGroup->attributes()->saveMany([
            new Attribute(['value' => 'Corto']),
            new Attribute(['value' => 'Lungo']),
        ]);

        $colorsGroup = GroupAttribute::create([
            'name' => 'Colore',
            'options_type' => 'radio',
            'position' => 1,
        ]);

        $colorsGroup->attributes()->saveMany([
            new Attribute(['value' => 'Rosso', 'color' => '#d91919']),
            new Attribute(['value' => 'Verde', 'color' => '#3eb6a1']),
            new Attribute(['value' => 'Blu', 'color' => '#2574f4']),
            new Attribute(['value' => 'Giallo', 'color' => '#fbbd3c']),
            new Attribute(['value' => 'Arancione', 'color' => '#fa8072']),
            new Attribute(['value' => 'Viola', 'color' => '#890ef2']),
            new Attribute(['value' => 'Marrone', 'color' => '#6f4f56']),
            new Attribute(['value' => 'Rosa', 'color' => '#ffb3ba']),
            new Attribute(['value' => 'Rosa', 'color' => '#ffb3ba']),
            new Attribute(['value' => 'Nero', 'color' => '#000000']),
            new Attribute(['value' => 'Bianco', 'color' => '#ffffff']),
        ]);
        
        $sizesGroup = GroupAttribute::create([
            'name' => 'Taglie',
            'options_type' => 'radio',
            'position' => 2,
        ]);

        $sizesGroup->attributes()->saveMany([
            new Attribute(['value' => 'XS']),
            new Attribute(['value' => 'S']),
            new Attribute(['value' => 'M']),
            new Attribute(['value' => 'L']),
            new Attribute(['value' => 'XL']),
            new Attribute(['value' => '2XL']),
            new Attribute(['value' => '3XL']),
        ]);
    }
}
