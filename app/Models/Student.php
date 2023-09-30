<?php

namespace App\Models;
use App\Models\Level;
use App\Models\Course;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $fillable=['full_name','code','email','date_of_birth','level_id'];
    protected $guarded=['id'];
    protected $hidden=['created_at','updated_at'];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id')->withPivot(['student_id']);
    }
}
