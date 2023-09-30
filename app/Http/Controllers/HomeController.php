<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function courses(){
        $courses=Course::get();
        return response()->json($courses);
    }

    public function searchCourses(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('code', 'LIKE', "%$query%")
                           ->orWhere('name', 'LIKE', "%$query%")
                           ->get();

        return response()->json($courses);
    }

    public function getCourseStudents($id){
        $course=Course::with(['students'=>function($q){
            $q->select('full_name','code');
        }])->find($id);

        return response()->json($course->students);
    }
}
