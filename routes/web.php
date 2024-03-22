<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[HomeController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','CheckAdmin'])->group(function () {
    Route::resource('courses',CourseController::class);

    Route::resource('students',UserController::class);

    Route::get("admin/students/index",[UserController::class,'index'])->name('users.index');

    Route::get("users/no-courses",[CourseUserController::class,'studentWithoutCourses'])->name('users.noCourses');

    Route::get("usercourse",[CourseUserController::class,'userCourse'])->name('usercourse');

    Route::get("usercourseprice",[CourseUserController::class,'userPaidGT1000'])->name('usercourseprice');

    Route::get("usercourses",[CourseUserController::class,'userCourses'])->name('usercourses');

});

// Student's Routes
Route::get('/student/courses', [CourseController::class, 'indexForStudent'])->name('courses.student');
Route::post('courses/search', [CourseController::class,'search'])->name('courses.search');
Route::post('courses/register{course_id}', [CourseUserController::class,'register'])->name('courses.register');
Route::get('/student/courses/{user_id}', [CourseUserController::class,'mycourses'])->name('mycourses');
