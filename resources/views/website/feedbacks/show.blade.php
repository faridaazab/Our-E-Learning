@extends('layouts.website.master')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
      <div class="container">
        <h2 ><a style="color: white" href="{{ route('feedbackSingle', $feedback->id ) }}"></a> Feedback</h2>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Feedback Details Section ======= -->
    <section id="feedback-details" class="feedback-details">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <form action="{{ route('feedbackSingle', $feedback->id) }}" method="GET">
                <div class="row">
                    <div class="col-lg-8">
                        <img src="/assets/website/img/feedback-details.jpg" class="img-fluid" alt="">
                        <h3><a href="{{ route('feedbackSingle', $feedback->id) }}">{{ $feedback->feedback }}</a></h3>

                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Cource Details Section -->


  </main>
@endsection
