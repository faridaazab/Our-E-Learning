<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Course, User};

class CourseStudentController extends Controller
{
    private function ensureStudent($user)
    {
        if($user->user_type !== "student"){
            return abort(403, 'Only students can enroll in course.');
        }
    }

    /**
     * Display a listing of the resource for each student that have courses.
     */
    public function studentIndex($userId)
    {
        $userId = auth()->user()->id;
        $user = User::with('courses')->findOrFail($userId);
        $this->ensureStudent($user);
        return view('website.course-student.index', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $userId)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'course_id' => ['required', 'exists:courses,id'],
        ],[
            'course_id.required' => 'Course is required.',
            'course_id.exists'   => 'Invalid course selected.'
        ]);

        // Get the authenticated user (assumes only students can access this route)
        $user = auth()->user();

        // Ensure the user is a student
        $this->ensureStudent($user);

        // Get the selected course ID from the request
        $courseId = $validatedData['course_id'];

        // Check if the user is already enrolled in this course
        if ($user->courses()->where('courses.id', $courseId)->exists()) {
            return redirect()->back()
                ->with('warning', ucfirst($user->username).", you are already enrolled in this course! You can check the courses that you were enrolled from here");
        }

        $user->courses()->attach($courseId);

        // Get the course name to display in the session message
        $courseName = Course::where('id', $courseId)->value('name');

        return redirect()->back()
            ->with('success', "Course ($courseName) enrolled successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userId, $courseId)
    {
        $user = User::findOrFail($userId);
        $this->ensureStudent($user);
        $user->courses()->detach($courseId);
        // Get the course name to display in the session message
        $courseName = Course::where('id', $courseId)->value('name');
        return redirect()->back()
            ->with('success', "Course ($courseName) deleted successfully.");
    }
}
