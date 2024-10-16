@extends('layouts.website.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Your Courses</h2>
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

          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @forelse ($user->courses as $course)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="course-item">
                    <img src="/assets/website/img/course-1.jpg" class="img-fluid" alt="...">
                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4><a href="{{ route('courseSingle', $course->id) }}" class="text-white">{{ $course->name }}</a></h4>
                        </div>

                        {{-- <h3><a href="{{ route('courseSingle', $course->id) }}">{{ $course->name }}</a></h3> --}}
                        <p>{{ $course->smallDescription }}</p>

                        <div class="sessions">
                            @if($course->sessions)
                                @php $sessions = json_decode($course->sessions, true); @endphp
                                <h5>Sessions:</h5>
                                <ul>
                                    @foreach ($sessions as $session)
                                        <li>{{ $session['name'] }}</li>
                                        <ul>
                                            <li><a href="{{ $session['link'] }}" class="text-primary text-decoration-underline">{{ Str::limit($session['link'], 30, '...') }}</a></li>
                                        </ul>
                                    @endforeach
                                </ul>
                            @else
                                <p>No sessions available.</p>
                            @endif
                        </div>

                        <div class="trainer d-flex justify-content-between align-items-center">
                            <div class="trainer-profile d-flex align-items-center">
                                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                <span><b>Instructor:</b> <label class="text-secondary">{{ $course->instructor->username }}</label></span>

                            </div>
                            <div class="trainer-rank d-flex align-items-center">
                                {{-- <i class="bx bx-user"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bx bx-heart"></i>&nbsp;65 --}}
                                <form action="{{ route('student-enrollments-website.destroy', [$user->id, $course->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="course_id" id="course_id" class="btn btn-danger" value="{{ $course->id }}">Remove</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Course Item -->
        @empty
            <p>There are no courses found for you.</p>
            <p>
                Go ahead! Add courses and lets begin to draw your journey &hearts;. Check our courses from
                <a href="{{ url('/all-courses') }}"
                    class="text-primary text-decoration-underline font-weight-bold">
                    here.
                </a>
            </p>
        @endforelse

          </div>

        </div>
        </div>
      </section><!-- End Courses Section -->

  </main><!-- End #main -->

@endsection
