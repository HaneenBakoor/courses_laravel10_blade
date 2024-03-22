<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\UserFactory;

// use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use Illuminate\Http\Request;


use App\Models\Course;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = User::all()->where('type', '=', "student");
        return view('admin/students/index', compact('students'));
    }

    public function create()
    {
        return view('admin/students/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $request->password
         ]);
        // $user = factory(User::class,10)->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        // ]);
         return redirect()->route('students.index');
    }


    public function show($id)
    {
        $course=User::find($id);
        return view('students.index', compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student=User::findorfail($id);
        return view('admin/students/edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student=User::findorfail($id);
        $student->name=$request->name;
        $student->email=$request->email;
        //$student->password=$request->password;
        $student->save();
        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::findorfail($id)->delete();
        return redirect()->route('students.index');
    }

}
