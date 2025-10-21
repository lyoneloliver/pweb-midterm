<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Courses;
use App\Models\Departments;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Courses::with('department')->paginate(10);
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $departments = Departments::all();
        return view('admin.courses.create', compact('departments'));
    }

    public function store(CourseRequest $request)
    {
        Course::create($request->validated());
        return redirect()->route('admin.courses.index')->with('success', 'Course created');
    }

    public function edit(Courses $course)
    {
        $departments = Departments::all();
        return view('admin.courses.edit', compact('course', 'departments'));
    }

    public function update(CourseRequest $request, Courses $course)
    {
        $course->update($request->validated());
        return redirect()->route('admin.courses.index')->with('success', 'Course updated');
    }

    public function destroy(Courses $course)
    {
        $course->delete();
        return back()->with('success', 'Course deleted');
    }
}
