<?php

namespace App\Http\Controllers\dashboard;

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
     * Display a listing of the resource for all students that have courses.
     */
    public function index()
    {
        $users = User::where('user_type', 'student')
                ->has('courses')
                ->with('courses')
                ->get();
        return view('dashboard.course-students.indexes.all-students-courses-index', compact('users'));
    }

    /**
     * Display a listing of the resource for each student that have courses.
     */
    public function studentIndex($userId)
    {
        $user = User::with('courses')->findOrFail($userId);
        $this->ensureStudent($user);
        return view('dashboard.course-students.indexes.student-courses-index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($userId)
    {
        $user = User::findOrFail($userId);
        $this->ensureStudent($user);
        $courses = Course::all();
        return view('dashboard.course-students.student-courses-enrollment-create', compact('user', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $userId)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'course_ids' => ['required', 'array'],  // Must be an array
        //     'course_ids.*' => ['exists:courses,id'], // Each element must exist in the courses table
        // ]);

        $user = User::findOrFail($userId);
        $userName = $user->username;
        $this->ensureStudent($user);

        // $courseIds = $validatedData['course_ids'];
        $courseIds = $request->course_ids;

        $existingCourseIds = $user->courses()->pluck('courses.id')->toArray();
        $newCourseIds      = array_diff($courseIds, $existingCourseIds); // Get only new courses

        if(empty($newCourseIds)){
            return redirect()->route('students-enrollments.studentIndex', $userId)
            ->with('warning', "$userName, already enrolled in these courses!");
        }

        $user->courses()->attach($newCourseIds);

        return redirect()->route('students-enrollments.studentIndex', $userId)
            ->with('success', "Courses enrolled successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $userId)
    {
        if(auth()->user()->user_type === "admin"){
            $user = User::findOrFail($userId);
            $this->ensureStudent($user);
            if($user->courses->count() !== 0){
                $courses = Course::all();
                return view('dashboard.course-students.student-courses-enrollment-edit', compact('user', 'courses'));
            }
            return view('errors.custom-courses-404');
        }
        return redirect()->route('students-enrollments.studentIndex', $userId);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $userId)
    {
        // Validate the request data
        // $validatedData = $request->validate([
        //     'course_ids' => ['required', 'array'],  // Must be an array
        //     'course_ids.*' => ['exists:courses,id'], // Each element must exist in the courses table
        // ]);

        $user = User::findOrFail($userId);
        $userName = $user->username;
        $this->ensureStudent($user);

        // $courseIds = $validatedData['course_ids'];
        $courseIds = $request->course_ids;

        $existingCourseIds = $user->courses()->pluck('courses.id')->toArray();
        $newCourseIds      = array_diff($courseIds, $existingCourseIds); // Get only new courses

        if(empty($newCourseIds) && count($courseIds) > 0){
            return redirect()->route('students-enrollments.studentIndex', $userId)
            ->with('warning', "$userName, already enrolled in these courses!");
        }

        // this will replace existing courses with the new courses
        // $user->courses()->sync($newCourseIds);

        // attach only new courses to the student (user) without affecting the existing courses
        $user->courses()->attach($newCourseIds);

        return redirect()->route('students-enrollments.studentIndex', $userId)
            ->with('success', "Courses updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $userId, $courseId)
    {
        $user = User::findOrFail($userId);
        $this->ensureStudent($user);
        $user->courses()->detach($courseId);
        return redirect()->route('students-enrollments.studentIndex', $userId)
            ->with('success', "Course deleted successfully.");
    }
}
