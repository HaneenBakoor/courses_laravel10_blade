<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function register($course_id){
        if (Auth::check()) {

            $id = Auth::id();
            $user = User::find($id);
            if ($user->courses()->where('course_id', $course_id)->exists()) {
                return back()->with('error', 'Data already exists in the database!');
            }
            $course = Course::find($course_id);

            $user->courses()->attach($course);
            return back()->with('success', 'Data saved successfully!');
        }
    }

    public function userCourse(){

        $students = User::has('courses')->get();
        $heading = "Students Enrolled To Courses";
        return view('admin/students/studentCourse', compact('students','heading'));

    }

    public function userCourses(){

        $students = User::has('courses', '>', 1)->get();
        $heading = "Students Enrolled To More Than One Course";
        return view('admin/students/studentCourse', compact('students','heading'));

    }

    public function userPaidGT1000(){

        $students = User::with(['courses' => function ($query) {
                $query->select('courses.*');
            }])
            ->withSum('courses', 'price')
            ->having('courses_sum_price', '>', 1000)
            ->groupBy('id')
            ->get();
        $heading = "Students Paid More Than 1000";
        return view('admin/students/studentCourse', compact('students','heading'));

    }

    public function studentWithoutCourses(){
        $students = User::doesntHave('courses')->where('type','=','student')->get();
        $heading = "Students Not Enrolled To Any Course:";
        return view('admin/students/studentCourse', compact('students','heading'));

    }
    public function mycourses($user_id)
    {
        $user = User::find($user_id);
        $courses = $user->courses;
        return view('courses/mycourses',compact('courses'));
    }

}
