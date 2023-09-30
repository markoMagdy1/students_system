<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/students',[StudentController::class,'index']);
Route::get('/students/{id}',[StudentController::class,'get_student']);
Route::get('/students/level/{levelId}',[StudentController::class,'getStudentsByLevel']);
Route::get('/student/search',[StudentController::class,'searchStudents']);
Route::put('/students/{id}',[StudentController::class,'update']);
Route::post('/students/add',[StudentController::class,'create']);
Route::delete('/students/delete/{id}',[StudentController::class,'destroy']);

Route::get('/courses',[HomeController::class,'courses']);
Route::get('/course/search',[HomeController::class,'searchCourses']);
Route::get('/course/students/{id}',[HomeController::class,'getCourseStudents']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
