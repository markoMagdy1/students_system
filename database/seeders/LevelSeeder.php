<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'name'=>"Level-1",
            'number'=>"01",
        ]);
        Level::create([
            'name'=>"Level-2",
            'number'=>"02",
        ]);
        Level::create([
            'name'=>"Level-3",
            'number'=>"03",
        ]);
        Level::create([
            'name'=>"Level-4",
            'number'=>"04",
        ]);
    }
}
