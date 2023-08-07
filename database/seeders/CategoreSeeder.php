<?php

namespace Database\Seeders;

use App\Models\Categore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categores = [
            [
                'title' => 'هتل',
                'slug' => 'hotels'
            ],
            [
                'title' => 'تور',
                'slug' => 'tors'
            ],
            [
                'title' => 'ویلا و اقامت گاه',
                'slug' => 'villas'
            ],
            [
                'title' => 'بلیط هواپیما',
                'slug' => 'airfare'
            ],
            [
                'title' => 'بلیط قطار',
                'slug' => 'train-ticket'
            ]
        ];
        foreach ($categores as $key => $value) {
            # code...
            Categore::create($value);
        }
    }
}
