<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GradeItem;

class GradeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GradeItem::create([
            'name'=>'practical',
            'max_degree'=>50
        ]);
        GradeItem::create([
            'name'=>'oral',
            'max_degree'=>20
        ]);
        GradeItem::create([
            'name'=>'midterm',
            'max_degree'=>50
        ]);
        GradeItem::create([
            'name'=>'final',
            'max_degree'=>100
        ]);
    }
}
