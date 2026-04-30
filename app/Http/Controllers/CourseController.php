<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
{
    $courses = Course::with('users')->get();
    return view('courses.index', compact('courses'));
}

    public function store(Request $request)
    {
        // 🔒 حماية: فقط instructor
        if (auth()->user()->role != 'instructor') {
            abort(403, 'Unauthorized');
        }

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
        // 🔒 حماية: فقط student
        if (auth()->user()->role != 'student') {
            abort(403, 'Unauthorized');
        }

        $course = Course::findOrFail($id);

        $user = auth()->user();

        // 🔗 يمنع التكرار
        $user->courses()->syncWithoutDetaching([$course->id]);

        return back();
    }
}