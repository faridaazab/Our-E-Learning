@extends('layouts.website.master')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
      <div class="container">
        <h2 ><a style="color: white" href="{{ route('feedbacks.store') }}"></a> Feedback</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Feedback Details Section ======= -->
    <section id="feedback-details" class="feedback-details">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <form action="{{ route('feedbacks.store') }}" method="POST">
                <div class="row">
                    <div class="col-lg-8">
                        @csrf
                            @include('website.feedbacks.form')<!-- End General Form Elements -->
                            <div class="d-flex justify-content-lg-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                              </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Cource Details Section -->


  </main>
@endsection
