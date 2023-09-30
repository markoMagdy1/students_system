<?php

namespace App\Models;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at'];
    
    public function students(){
        return $this->hasMany(Student::class);
    }
}
