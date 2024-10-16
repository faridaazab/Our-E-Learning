<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        if(auth()->user()->user_type == "instructor"){
            $courses = Course::where('instructor_id', auth()->user()->id)->get();
        } else{ // auth()->user()->user_type == "admin"
            $courses = Course::all();
        }
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->user_type == "instructor") {
            return view('dashboard.courses.create');
        }
        return redirect()->route('courses.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->merge(["instructor_id" => auth()->user()->id]);
        Course::create($request->all());
        return redirect()->back()
            ->with('success', "Course \"" . $request['name'] . "\" created Successfully.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);
        return view('dashboard.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {

        $course = Course::findOrFail($id);
        if (auth()->user()->id == $course->instructor_id) {
            return view('dashboard.courses.edit', compact('course'));
        }
        return redirect()->route('courses.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $request->merge(["instructor_id" => auth()->user()->id]);
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', "Course \"" . $request['name'] . "\" updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Course Deleted Successfully');
    }


    public function destroyALL()
    {
        $courses = Course::all();
        foreach ($courses as $course) {
            $course->delete();
        }


        return redirect()->route('courses.index')
            ->with('success', 'All the courses has been deleted successfully');
    }
    //softDelete
    // Recycle bin/Trash {view/blade}

    // restore(from trash.blade.php)

    // forceDelete(from trash.blade.php) --> default of laravel => forceDelete


    public function trash()
    {
        $courses = Course::onlyTrashed()->where('instructor_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        if (auth()->user()->user_type == "instructor") {
            $courses_count = $courses->count();
            return view('dashboard.courses.trash', compact('courses', 'courses_count'));
        }
    }

    public function restore(string $id)
    {
        $course = Course::withTrashed()->where('instructor_id', auth()->user()->id)->find($id);
        if (auth()->user()->user_type == "instructor") {
            $course->restore();
            return redirect()->back()
                ->with('success', "Course \"$course->name\" has been restored successfully");
        }
    }

    public function forceDelete(string $id)
    {
        $course = Course::where('id', $id)->where('instructor_id', auth()->user()->id);
        $course->forceDelete();
        return redirect()->back();
    }
}
