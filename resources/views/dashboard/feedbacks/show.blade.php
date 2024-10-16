@extends('layouts.dashboard.master')

@section('title')
   Show Feedback
@endsection
@section('page-title-1', 'Feedbacks')
@section('page-title-2', 'All Feedbacks')
@section('content')
<section class="section profile">
    <div class="row">
      <div class="col-xl-16">

        <div class="card">
          <div class="card-body profile-card pt-8 d-flex flex-column align-items-center">



      <div class="col-xl-12">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->

            <form action="{{ route('feedbacks.show',$feedback->id) }}" method="GET">
            <div class="tab-content pt-2">


                <h5 class="card-title">Feedback Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Feedback:</div>
                  <div class="col-lg-9 col-md-8">{{ $feedback->feedback }}</div>
                </div><br>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Course:</div>
                    <div class="col-lg-9 col-md-8">{{ $feedback->course->name }}</div>
                  </div><br>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Student:</div>
                    <div class="col-lg-9 col-md-8">{{ $feedback->student->username }}</div>
                  </div><br>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection
