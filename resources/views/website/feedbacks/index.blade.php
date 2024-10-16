@extends('layouts.website.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Feedbacks</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="feedbacks mt-5">
                <h2 class="text-center">What Our Students Say</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Feedback</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $index => $feedback)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>"{{ $feedback->feedback == null ? '-' : Str::limit($feedback->feedback, 20, '...') }}"</td>
                                    <td>
                                        <a href="{{ route('feedbackSingle', $feedback->id) }}" class="btn btn-primary-success">Read More</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
        </div>
      </section><!-- End Courses Section -->

  </main><!-- End #main -->

@endsection
