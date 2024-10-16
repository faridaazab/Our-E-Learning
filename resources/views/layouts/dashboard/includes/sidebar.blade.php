
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard-home') }}">
          <i class="fs-5 ri-home-4-fill"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="fs-5 ri-earth-fill"></i>
          <span>Website</span>
        </a>
      </li

         {{-- Users --}}
         <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                <i class="fs-5 bx bxs-user-account"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
            <a href="{{ route('users.index') }}">
              <i class="fs-5 ri-file-user-line"></i></i><span>All Users ({{ \App\Models\User::count() }})</span>
            </a>
          </li>

          <li>
            <a href="{{ route('users.students') }}">
              <i class="fs-5 ri-user-fill"></i><span>Students ({{ \App\Models\User::where('user_type', 'student')->count() }})</span>
            </a>
          </li>

          <li>
            <a href="{{ route('users.instructors') }}">
              <i class="fs-5 ri-user-star-fill"></i><span>Instructors ({{ \App\Models\User::where('user_type', 'instructor')->count() }})</span>
            </a>
          </li>

          <li>
            <a href="{{ route('users.admins') }}">
              <i class="fs-5 ri-shield-user-fill"></i><span>Admins ({{ \App\Models\User::where('user_type', 'admin')->count() }})</span>
            </a>
          </li>

          <li>
            <a href="{{ route('users.create') }}">
              <i class="fs-5 ri-user-add-fill"></i><span>Create User</span>
            </a>
          </li>

      <!-- End Components Nav -->

            </ul>
          </li>

          {{-- Categories --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#categories-nav" data-bs-toggle="collapse" href="#">
            <i class="fs-5 bx bx-category"></i><span>Categories</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="categories-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>
                <a href="{{ route('categories.index') }}">
                <i class="fs-5 bx bx-list-ul"></i><span>All Categories ({{ \App\Models\Category::count() }})</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.create') }}">
                <i class="fs-5 bx bxs-plus-circle"></i><span>Create Category</span>
                </a>
            </li>

            <li>
                <a href="{{ route('categories.trash') }}">
                <i class="fs-5 bx bxs-trash"></i><span>Trashed Categories ({{ \App\Models\Category::onlyTrashed()->count() }})</span>
                </a>
            </li>

            </ul>
        </li><!-- End Components Nav -->

     {{-- courses --}}
     <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#courses-nav" data-bs-toggle="collapse" href="#">
            <i class="fs-5 bx bxl-react"></i><span>Courses</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="courses-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('/dashboard/courses') }}">
                <i class="fs-5 bx bx-list-ul"></i><span>All Courses ({{ \App\Models\Course::count()}})</span>
            </a>
          </li>
          <li>
            <a href="{{ url('/dashboard/courses/create') }}">
                <i class="fs-5 bx bxs-plus-circle"></i><span>Create Courses</span>
            </a>
          </li>

          <li>
            <a href="{{ route('students-enrollments.index') }}">
                <i class="fs-5 bi bi-person-lines-fill"></i><span>Enrolled Students ({{ \App\Models\User::where('user_type', 'student')->has('courses')->count() }})</span>
            </a>
          </li>

          <li>
            <a href="{{ route('courses.trash') }}">
                <i class="fs-5 bx bxs-trash"></i><span>Trashed Courses ({{ \App\Models\Course::onlyTrashed()->count()}})</span>
            </a>
          </li>

        </ul>
      </li>
      <!-- End Components Nav -->

      {{-- quizzes --}}
      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#quizzes-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Quizzes</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="quizzes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('quizzes.index') }}">
              <i class="bi bi-circle"></i><span>ALL Quizzes ({{ \App\Models\Quiz::count()}})</span>
            </a>
          </li>
          <li>
            <a href="{{ route('quizzes.create') }}">
              <i class="bi bi-circle"></i><span>Create Quiz</span>
            </a>
          </li>

          <li>
            <a href="{{ route('quizzes.trash') }}">
              <i class="bi bi-circle"></i><span>Trashed Quizzes({{ \App\Models\Quiz::onlyTrashed()->count()}})</span>
            </a>
          </li>

        </ul>
      </li> --}}

           {{-- Feedbacks --}}
           <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#feedbacks-nav" data-bs-toggle="collapse" href="#">
              <i class="fs-5 bx bxs-notepad"></i><span>Feedbacks</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="feedbacks-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{ route('feedbacks.index') }}">
                  <i class="bi bi-circle"></i><span>All Feedbacks ({{ \App\Models\Feedback::count()}})</span>
                </a>
              </li>
            </ul>
          </li>
          <!-- End Components Nav -->

    </ul>
</aside>
