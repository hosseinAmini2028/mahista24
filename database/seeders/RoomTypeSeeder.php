<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roomTypes = [
            [
                'title' => 'یک تخته'
            ],
            [
                'title' => 'دو تخته'
            ],
            [
                'title' => 'سه تخته'
            ]
        ];

        foreach ($roomTypes as $key => $value) {
            # code...
            RoomType::create($value);
        }
    }
}
