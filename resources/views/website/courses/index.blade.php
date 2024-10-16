@extends('layouts.website.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p> We strive to deliver high-quality experiences by offering courses that cater to various needs and interests. Our selection ensures you can find valuable insights, resources, and tools tailored to your preferences.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            @if ($successMsg = Session::get('success'))
            <div class="alert alert-success text-center mt-3">
                {{ $successMsg }}
            </div>
            @endif

            @if ($warningMsg = Session::get('warning'))
            <div class="alert alert-warning text-center mt-3">
                {{ $warningMsg }}
                <a href="{{ route('student-enrollments-website.studentIndex', auth()->user()->id) }}"
                    class="text-primary text-decoration-underline font-weight-bold">
                    your courses
                </a>.
            </div>
            @endif

          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @forelse ($courses as $course)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                    <img src="/assets/website/img/course-1.jpg" class="img-fluid" alt="...">
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4><a href="{{ route('categorySingle', $course->category_id) }}" class="text-white">{{ $course->category->name }}</a></h4>
                        </div>

                        <h3><a href="{{ route('courseSingle', $course->id) }}">{{ $course->name }}</a></h3>
                        <p>{{ $course->smallDescription }}</p>

                        @if($course->sessions->count() > 0)
                        <div class="sessions">
                            <h5>Sessions:</h5>
                            <ul>
                                @foreach ($course->sessions as $session)
                                    <li>{{ $session['name'] }}</li>
                                    <ul>
                                        <li><a href="{{ $session['link'] }}" class="text-primary text-decoration-underline">{{ Str::limit($session['link'], 30, '...') }}</a></li>
                                    </ul>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                <span><b>Instructor:</b> <label class="text-secondary">{{ $course->instructor->username }}</label></span>

                            </div>
                            @if(auth()->user()->user_type === "student")
                            <div class="trainer-rank d-flex align-items-center">
                                {{-- <i class="bx bx-user"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bx bx-heart"></i>&nbsp;65 --}}
                                <form action="{{ route('student-enrollments-website.store', auth()->user()->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" name="course_id" id="course_id" class="btn btn-success" value="{{ $course->id }}">Enroll</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div> <!-- End Course Item -->
        @empty
            <p>There are no courses found.</p>
        @endforelse

          </div>

        </div>
        </div>
      </section><!-- End Courses Section -->

  </main><!-- End #main -->

@endsection
