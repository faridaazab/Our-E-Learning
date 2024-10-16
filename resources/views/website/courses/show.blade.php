@extends('layouts.website.master')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
      <div class="container">
        <h2 ><a style="color: white" href="{{ route('courseSingle', $course->id ) }}">{{ $course->name }}</a> Details</h2>
        <p>{{ $course->smallDescription }}</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Course Details Section ======= -->
    <section id="course-details" class="course-details">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <form action="{{ route('courseSingle', $course->id) }}" method="GET">
                <div class="row">
                    <div class="col-lg-8">
                        <img src="/assets/website/img/course-details.jpg" class="img-fluid" alt="">
                        <h3><a href="{{ route('courseSingle', $course->id) }}">{{ $course->name }}</a></h3>
                        <p>{{ $course->description }}</p>

                        <!-- هنا يتم عرض أسماء الجلسات وروابطها -->
                        @if($course->sessions)
                            @php $sessions = json_decode($course->sessions, true); @endphp
                            <h5>Sessions:</h5>
                            <ul>
                                @foreach ($sessions as $session)
                                    <li>{{ $session['name'] }}</li>
                                    <ul>
                                        <li><a href="{{ $session['link'] }}" class="text-primary text-decoration-underline">{{ $session['link'] }}</a></li>
                                    </ul>
                                @endforeach
                            </ul>
                        @else
                            <p>No sessions available.</p>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Cource Details Section -->
    <div class="feedbacks mt-5">
        <h2 class="text-center">What Our Students Say</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($course->feedbacks->take(5) as $index => $feedback)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>"{{ $feedback->feedback == null ? '-' : Str::limit($feedback->feedback, 20, '...') }}"</td>
                        </tr>
                    @empty
                        There are no feedbacks for this course yet.
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('feedbacks.index') }}" class="btn btn-primary-success text-success">View All Feedbacks</a>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('feedbacks.create') }}" class="btn btn-primary-success text-success">Create Feedback</a>
        </div>
    </div>
  </main>
@endsection
