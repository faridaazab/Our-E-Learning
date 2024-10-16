<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">E Learning</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="/assets/website/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a @if(Route::is('home')) class="active" @endif href="{{ route('home') }}">Home</a></li>
          <li><a @if(Route::is('about')) class="active" @endif href="{{ route('about') }}">About</a></li>
          <li><a @if (Route::is('categories.index')) class="active" @endif href="{{ route('categories') }}">Categories</a></li>
          <li><a @if(Route::is('courses.index')) class="active" @endif href="{{ url('/all-courses') }}">Courses</a></li>
          @auth
            @if(auth()->user()->user_type === "student" && auth()->user()->courses->count() > 0)
            <li><a @if(Route::is('courses.index')) class="active" @endif href="{{ route('student-enrollments-website.studentIndex', auth()->user()->id) }}">My Courses ({{ auth()->user()->courses->count() }})</a></li>
            @endif
          @endauth
          <li><a href="contact.html">Contact</a></li>
          <li><a href="javascript:void(0)" style="user-select:none; cursor: context-menu; color: inherit;">|</a></li>
          @if(!auth()->user())
          <li><a href="{{ route('register') }}">Register</a></li>
          <li><a href="{{ route('login') }}">Login</a></li>
          @endif
          @if (auth()->user())
          <li>
              <li class="dropdown"><a href="javascript:void(0)"><span>{{ auth()->user()->name != null ? ucfirst(auth()->user()->name) : ucfirst(auth()->user()->username) }} ({{ ucfirst(auth()->user()->user_type) }})</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ route('profileView', auth()->user()->id) }}">Profile Management</a></li>
                  @auth
                    @if (auth()->user()->user_type == "admin" || auth()->user()->user_type == "instructor")
                    <li><a href="{{ route('dashboard-home') }}">Dashboard</a></li>
                    @endif
                  @endauth
                  <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                </ul>
              </li>
          </li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->
