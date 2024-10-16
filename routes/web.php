<?php

use App\Http\Controllers\website\{
    HomeController as WebHome,
    CategoryController as CategoryWebsite,
    QuizController as QuizWebsite,
    CourseController as CourseWebsite,
    FeedbackController as FeedbackWebsite,
    UserProfileController,
    CourseStudentController as StudentCourseEnrollmentWebsite,
};

use App\Http\Controllers\dashboard\{

    // use App\Http\Controllers\dashboard\HomeController;
    HomeController as DashHome,
    CategoryController as CategoryDashboard,
    UserController,
    QuizController as QuizDashboard,
    CourseController as CourseDashboard,
    CourseStudentController as StudentCourseEnrollmentDashboard,
    SessionController as SessionDashboard,
    FeedbackController as FeedbackDashboard,
};
use App\Models\Feedback;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Auth::routes();

// protected $redirectTo ='/dashboard';


// to handle when i write localhost:8000
// Method(1)
// Route::redirect('/','/dashboard');
// Route::redirect('/login','/dashboard/login');
//Method(2)
Route::get('/', function () {
    return redirect('/dashboard');
});

// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
//==


// Route::resource('/students',StudentController::class);
// Route::delete('/all-students/delete', [StudentController::class, 'destroyAll'])->name('students.destroyAll');

// Route::prefix('dashboard')->group(function(){
//     Route::get('/', [HomeController::class, 'index'])->middleware('dashboard','auth')-> name('dashboard-home');
//     Route::resource('/categories',CategoryController::class);
//     Route::delete('/all-categories/delete',[CategoryController::class, 'destroyALL'])->name('categories.destroyAll');
// });


Route::group(
    [
        'middleware' => ['dashboard']
    ],
    function () {
        Route::prefix('dashboard')->group(function () {
            Route::get('/', [DashHome::class, 'index'])->name('dashboard-home');
            Route::resource('/categories', CategoryDashboard::class);
            Route::delete('/all-categories/delete', [CategoryDashboard::class, 'destroyALL'])->name('categories.destroyAll');
            Route::get('/category/delete', [CategoryDashboard::class, 'trash'])->name('categories.trash');
            Route::get('/category/restore/{id}', [CategoryDashboard::class, 'restore'])->name('categories.restore');
            Route::get('/category/forceDelete/{id}', [CategoryDashboard::class, 'forceDelete'])->name('categories.forceDelete');
            // users routes
            Route::resource('/users', UserController::class);
            Route::get('/user/students', [UserController::class, 'studentsIndex'])->name('users.students');
            Route::get('/user/instructors', [UserController::class, 'instructorsIndex'])->name('users.instructors');
            Route::get('/user/admins', [UserController::class, 'adminsIndex'])->name('users.admins');
            // quiz routes
            Route::resource('/quizzes', QuizDashboard::class);
            Route::delete('/all-quizzes/delete', [QuizDashboard::class, 'destroyALL'])->name('quizzes.destroyAll');
            Route::get('/quiz/delete', [QuizDashboard::class, 'trash'])->name('quizzes.trash');
            Route::get('/quiz/restore/{id}', [QuizDashboard::class, 'restore'])->name('quizzes.restore');
            Route::get('/quiz/forceDelete/{id}', [QuizDashboard::class, 'forceDelete'])->name('quizzes.forceDelete');
            // course routes
            Route::resource('/courses', CourseDashboard::class);
            Route::delete('/all-courses/delete', [CourseDashboard::class, 'destroyALL'])->name('courses.destroyAll');
            Route::get('/course/delete', [CourseDashboard::class, 'trash'])->name('courses.trash');
            Route::get('/course/restore/{id}', [CourseDashboard::class, 'restore'])->name('courses.restore');
            Route::get('/course/forceDelete/{id}', [CourseDashboard::class, 'forceDelete'])->name('courses.forceDelete');
            // Student (users) - Course (Enrollment)
            Route::get('/all-students/courses', [StudentCourseEnrollmentDashboard::class, 'index'])->name('students-enrollments.index');
            Route::get('/students/{userId}/courses', [StudentCourseEnrollmentDashboard::class, 'studentIndex'])->name('students-enrollments.studentIndex');
            Route::get('/students/{userId}/courses/create', [StudentCourseEnrollmentDashboard::class, 'create'])->name('students-enrollments.create');
            Route::post('/student/{userId}/courses', [StudentCourseEnrollmentDashboard::class, 'store'])->name('students-enrollments.store');
            Route::get('/students/{userId}/courses/edit', [StudentCourseEnrollmentDashboard::class, 'edit'])->name('students-enrollments.edit');
            Route::put('/students/{userId}/courses', [StudentCourseEnrollmentDashboard::class, 'update'])->name('students-enrollments.update');
            Route::delete('/students/{userId}/courses/{courseId}', [StudentCourseEnrollmentDashboard::class, 'destroy'])->name('students-enrollments.destroy');
            // feedback routes
            Route::resource('/feedbacks', FeedbackDashboard::class)->except(['edit', 'update']);
            Route::delete('/all-feedbacks/delete', [FeedbackDashboard::class, 'destroyALL'])->name('feedbacks.destroyAll');
            // session routes
            Route::resource('/sessions', SessionDashboard::class);
            Route::delete('/all-/delete', [SessionDashboard::class, 'destroyALL'])->name('.destroyAll');
            Route::get('/feedback/delete', [SessionDashboard::class, 'trash'])->name('.trash');
            Route::get('/feedback/restore/{id}', [SessionDashboard::class, 'restore'])->name('.restore');
            Route::get('/feedback/forceDelete/{id}', [SessionDashboard::class, 'forceDelete'])->name('.forceDelete');
        });
    }
);

Route::get('/', [WebHome::class, 'index'])->name('home');
Route::get('/about', [WebHome::class, 'about'])->name('about');
Route::get('/content', [WebHome::class, 'content'])->name('content');
Route::get('/all-categories', [CategoryWebsite::class, 'index'])->name('categories');
Route::get('/category/{id}', [CategoryWebsite::class, 'show'])->name('categorySingle');
Route::get('/quizzes/{id}', [QuizWebsite::class, 'show'])->name('quizzes.show');
Route::get('/all-courses', [CourseWebsite::class, 'index'])->name('courses');
Route::get('/courses/{id}', [CourseWebsite::class, 'show'])->name('courseSingle');
// Route::get('/all-feedbacks', FeedbackWebsite::class),[];
Route::get('/feedback/{id}', [FeedbackWebsite::class, 'show'])->name('feedbackSingle');

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('/my-profile/{id}', [UserProfileController::class, 'profileView'])->name('profileView');
        Route::patch('/profile/{id}', [UserProfileController::class, 'updateProfile'])->name('updateProfile');
        Route::group(
            ['middleware' => 'studentsOnly'],
            function () {
                Route::get('/{userId}/my-courses', [StudentCourseEnrollmentWebsite::class, 'studentIndex'])->name('student-enrollments-website.studentIndex');
                Route::post('/{userId}/course', [StudentCourseEnrollmentWebsite::class, 'store'])->name('student-enrollments-website.store');
                Route::delete('/{userId}/courses/{courseId}', [StudentCourseEnrollmentWebsite::class, 'destroy'])->name('student-enrollments-website.destroy');
            }
        );
    }
);
