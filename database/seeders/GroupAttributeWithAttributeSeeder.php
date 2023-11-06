<?php

namespace Database\Seeders;

use App\Models\Term;
use App\Models\Attribute;
use Illuminate\Database\Seeder;

class GroupAttributeWithAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lengthsGroup = Attribute::create([
            'name' => 'Lughezza',
            'options_type' => 'select',
            'position' => 0,
        ]);

        $lengthsGroup->terms()->saveMany([
            new Term([
                'value' => 'Corto',
                'position' => 0
            ]),
            new Term([
                'value' => 'Lungo',
                'position' => 1
            ]),
        ]);

        $colorsGroup = Attribute::create([
            'name' => 'Colore',
            'options_type' => 'radio',
            'position' => 1,
        ]);

        $colorsGroup->terms()->saveMany([
            new Term([
                'value' => 'Rosso',
                'color' => '#d91919',
                'position' => 0
            ]),
            new Term([
                'value' => 'Verde',
                'color' => '#3eb6a1',
                'position' => 1
            ]),
            new Term([
                'value' => 'Blu',
                'color' => '#2574f4',
                'position' => 2
            ]),
            new Term([
                'value' => 'Giallo',
                'color' => '#fbbd3c',
                'position' => 3
            ]),
            new Term([
                'value' => 'Arancione',
                'color' => '#fa8072',
                'position' => 4
            ]),
            new Term([
                'value' => 'Viola',
                'color' => '#890ef2',
                'position' => 5
            ]),
            new Term([
                'value' => 'Marrone',
                'color' => '#6f4f56',
                'position' => 6
            ]),
            new Term([
                'value' => 'Rosa',
                'color' => '#ffb3ba',
                'position' => 7
            ]),
            new Term([
                'value' => 'Nero',
                'color' => '#000000',
                'position' => 8
            ]),
            new Term([
                'value' => 'Bianco',
                'color' => '#ffffff',
                'position' => 9
            ]),
        ]);

        $sizesGroup = Attribute::create([
            'name' => 'Taglie',
            'options_type' => 'radio',
            'position' => 2,
        ]);

        $sizesGroup->terms()->saveMany([
            new Term([
                'value' => 'XS',
                'position' => 0
            ]),
            new Term([
                'value' => 'S',
                'position' => 1
            ]),
            new Term([
                'value' => 'M',
                'position' => 2
            ]),
            new Term([
                'value' => 'L',
                'position' => 3
            ]),
            new Term([
                'value' => 'XL',
                'position' => 4
            ]),
            new Term([
                'value' => '2XL',
                'position' => 5
            ]),
            new Term([
                'value' => '3XL',
                'position' => 6
            ]),
        ]);
    }
}
