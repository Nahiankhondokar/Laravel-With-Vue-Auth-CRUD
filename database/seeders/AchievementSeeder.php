<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name'     => 'Achievement 01'],
            ['name'     => 'Achievement 02'],
            ['name'     => 'Achievement 03'],
            ['name'     => 'Achievement 04'],
            ['name'     => 'Achievement 05'],
            ['name'     => 'Achievement 06'],
            ['name'     => 'Achievement 07'],
            ['name'     => 'Achievement 08'],
            ['name'     => 'Achievement 09'],
            ['name'     => 'Achievement 10'],
        ];

        Achievement::insert($data);
    }
}
