<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
   public function index()
{
    $user = auth()->user();

    // instructor
    if ($user->role === 'instructor') {
        $courses = Course::with('users')->get();

        return view('courses.index', [
            'courses' => $courses,
            'myCourses' => [],
            'availableCourses' => []
        ]);
    }

    // student
    $myCourses = $user->courses;

    $availableCourses = Course::whereNotIn('id', $myCourses->pluck('id'))->get();

    return view('courses.index', [
        'myCourses' => $myCourses,
        'availableCourses' => $availableCourses,
        'courses' => [] // مهم عشان ما يصير error
    ]);
}
    public function store(Request $request)
    {
        if (auth()->user()->role != 'instructor') {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'name' => 'required',
            'min_students' => 'required|integer',
            'max_students' => 'required|integer',
        ]);

        Course::create([
            'name' => $request->name,
            'min_students' => $request->min_students,
            'max_students' => $request->max_students,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    public function join($id)
    {
        if (auth()->user()->role != 'student') {
            abort(403, 'Unauthorized');
        }

        $course = Course::findOrFail($id);
        $user = auth()->user();

        // منع التكرار
        if (!$user->courses->contains($course->id)) {
            $user->courses()->attach($course->id);
        }

        return back();
    }
}