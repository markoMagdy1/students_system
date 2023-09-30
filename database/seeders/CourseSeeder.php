<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'name'=>'php',
            'code'=>'coo1'
        ]);
        Course::create([
            'name'=>'java',
            'code'=>'coo2'
        ]);
        Course::create([
            'name'=>'c++',
            'code'=>'coo3'
        ]);
        Course::create([
            'name'=>'c#',
            'code'=>'coo4'
        ]);
        Course::create([
            'name'=>'dart',
            'code'=>'coo5'
        ]);
    }
}
