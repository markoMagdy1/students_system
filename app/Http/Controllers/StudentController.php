<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students=Student::with('level')->orderBy('id', 'desc')->limit(10)->get();
        return response()->json($students);
    }
    public function get_student($id)
    {
        $students=Student::with('level')->findOrFail($id);
        return response()->json($students);
    }

    public function getStudentsByLevel($levelId){
        $students = Student::with('level')->where('level_id', $levelId)->get();
        return response()->json($students);
    }

    public function searchStudents(Request $request)
{

    $query = $request->input('query');
    $students = Student::with('level')->where('code', 'LIKE', "%$query%")
                       ->orWhere('full_name', 'LIKE', "%$query%")
                       ->orWhere('email', 'LIKE', "%$query%")
                       ->get();

    return response()->json($students);
}

    public function create(Request $request)
    {
        // $validatedData = $request->validate([
        //     'full_name' => 'required|string|max:255',
        // ]);

        $new_student=Student::create($request['data']);
        return response()->json(['message'=>'new student added successfully']);

    }



    public function update(Request $request, $id)
    {
        $student = Student::find($id);

    if ($student) {
        $student->update($request['data']); // Update the student record
        return response()->json(['message' => 'Student updated successfully']);
    } else {
        return response()->json(['message' => 'Student not found'], 404);
    }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json(['message' => 'Record deleted successfully']);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
}
