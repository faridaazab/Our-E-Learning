@extends('layouts.dashboard.master')

@section('title')
   Show Quiz
@endsection
@section('page-title-1', 'Quizzes')
@section('page-title-2', 'All Quizzes')
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

            <form action="{{ route('quizzes.show',$quiz->id) }}" method="GET">
            <div class="tab-content pt-2">


                <h5 class="card-title">Quiz Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Link of Quiz</div>
                  <div class="col-lg-9 col-md-8"><a href="{{$quiz->link  }}"> {{$quiz->link  }}</a></div>
                </div><br>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Grades</div>
                  <div class="col-lg-9 col-md-8"><a href="{{ $quiz->grades }}">{{ $quiz->grades }}</a></div>
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
