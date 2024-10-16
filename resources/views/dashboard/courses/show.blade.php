@extends('layouts.dashboard.master')

@section('title')
   Show Course
@endsection
@section('page-title-1', 'Courses')
@section('page-title-2', 'All Courses')
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

            <form action="{{ route('courses.show',$course->id) }}" method="GET">
            <div class="tab-content pt-2">


                <h5 class="card-title">Course Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Name:</div>
                  <div class="col-lg-9 col-md-8">{{ $course->name }}</div>
                </div><br>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Sessions:</div>
                    <div class="col-lg-9 col-md-8">
                        @forelse ($course->sessions as $session)
                        <td><span class="bg bg-dark text-white p-1 px-2 rounded-2">{{$session->name}}</span>,</td>
                        @empty
                        <tr>
                        <td colspan="5" class="text-center">No sessions available.</td>
                        </tr>
                        <td>
                        @endforelse
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Instructor:</div>
                    <div class="col-lg-9 col-md-8">{{ $course->instructor->username }}</div>
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
