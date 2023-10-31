<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'parent'    => 'FLEXGXPro',
                'children'  => [
                    'Sottocategoria A',
                    'Sottocategoria B',
                    'Sottocategoria C',
                    'Sottocategoria D',
                    'Sottocategoria E',
                    'Sottocategoria F',
                    'Sottocategoria G',
                ]
            ],
            [
                'parent'    => 'SOXPro',
                'children'  => [
                    'Sottocategoria H',
                    'Sottocategoria I',
                    'Sottocategoria L',
                    'Sottocategoria M',
                    'Sottocategoria N',
                    'Sottocategoria O',
                    'Sottocategoria P',
                ]
            ],
            [
                'parent'    => 'LACEXPro',
                'children'  => [
                    'Sottocategoria Q',
                    'Sottocategoria R',
                    'Sottocategoria S',
                    'Sottocategoria T',
                    'Sottocategoria U',
                    'Sottocategoria V',
                    'Sottocategoria Z',
                ]
            ],
            [
                'parent'    => 'TUBEXPro',
                'children'  => [
                    'Sottocategoria A1',
                    'Sottocategoria B1',
                    'Sottocategoria C1',
                    'Sottocategoria D1',
                    'Sottocategoria E1',
                    'Sottocategoria F1',
                    'Sottocategoria G1',
                ]
            ],
        ];

        foreach ($categories as $category) {
            $parent = Category::create(['name' => $category['parent']]);
            foreach ($category['children'] as $children) {
                Category::create(['name' => $children, 'parent_id' => $parent->id]);
            }
        }
    }
}
