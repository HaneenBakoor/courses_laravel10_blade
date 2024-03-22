<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::all();

        return view('admin/courses/index', compact('courses'));
    }

    public function indexForStudent()
    {
        $courses=Course::all();

        return view('courses/index', compact('courses'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/courses/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::create([
            'name'=>$request->name,
            'price'=>$request->price
         ]);
         return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course=Course::all();
        return view('courses.index', compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course=Course::findorfail($id);
        return view('admin/courses/edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course=Course::findorfail($id);
        $course->name=$request->name;
        $course->price=$request->price;
        $course->save();
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('courses.index');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $courses = Course::where('name', 'LIKE', '%'.$searchTerm.'%')->get();
        return view('courses.search', ['searchTerm' => $searchTerm,'courses' => $courses]);
    }
}
