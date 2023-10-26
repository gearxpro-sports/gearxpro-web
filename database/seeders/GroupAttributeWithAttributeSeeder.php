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
            new Attribute([
                'value' => 'Corto',
                'position' => 0
            ]),
            new Attribute([
                'value' => 'Lungo',
                'position' => 1
            ]),
        ]);

        $colorsGroup = GroupAttribute::create([
            'name' => 'Colore',
            'options_type' => 'radio',
            'position' => 1,
        ]);

        $colorsGroup->attributes()->saveMany([
            new Attribute([
                'value' => 'Rosso',
                'color' => '#d91919',
                'position' => 0
            ]),
            new Attribute([
                'value' => 'Verde',
                'color' => '#3eb6a1',
                'position' => 1
            ]),
            new Attribute([
                'value' => 'Blu',
                'color' => '#2574f4',
                'position' => 2
            ]),
            new Attribute([
                'value' => 'Giallo',
                'color' => '#fbbd3c',
                'position' => 3
            ]),
            new Attribute([
                'value' => 'Arancione',
                'color' => '#fa8072',
                'position' => 4
            ]),
            new Attribute([
                'value' => 'Viola',
                'color' => '#890ef2',
                'position' => 5
            ]),
            new Attribute([
                'value' => 'Marrone',
                'color' => '#6f4f56',
                'position' => 6
            ]),
            new Attribute([
                'value' => 'Rosa',
                'color' => '#ffb3ba',
                'position' => 7
            ]),
            new Attribute([
                'value' => 'Nero',
                'color' => '#000000',
                'position' => 8
            ]),
            new Attribute([
                'value' => 'Bianco',
                'color' => '#ffffff',
                'position' => 9
            ]),
        ]);

        $sizesGroup = GroupAttribute::create([
            'name' => 'Taglie',
            'options_type' => 'radio',
            'position' => 2,
        ]);

        $sizesGroup->attributes()->saveMany([
            new Attribute([
                'value' => 'XS',
                'position' => 0
            ]),
            new Attribute([
                'value' => 'S',
                'position' => 1
            ]),
            new Attribute([
                'value' => 'M',
                'position' => 2
            ]),
            new Attribute([
                'value' => 'L',
                'position' => 3
            ]),
            new Attribute([
                'value' => 'XL',
                'position' => 4
            ]),
            new Attribute([
                'value' => '2XL',
                'position' => 5
            ]),
            new Attribute([
                'value' => '3XL',
                'position' => 6
            ]),
        ]);
    }
}
