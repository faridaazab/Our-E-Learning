@extends('layouts.dashboard.master')

@section('title')
    @if (auth()->user()->id != $user->id)
    Show User ({{ $user-> username }})
    @else
    Show Your Data
    @endif
@endsection
@section('page-title-1', 'Users')
@section('page-title-2', 'All Users')
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

            <form action="{{ route('users.show',$user->id) }}" method="GET">
            <div class="tab-content pt-2">


                <h5 class="card-title">
                    @if (auth()->user()->id != $user->id)
                    Show User ({{ $user-> username }})
                    @else
                    Show Your Data
                    @endif
                </h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">UserName</div>
                  <div class="col-lg-9 col-md-8">{{ $user->username }}</div>
                </div><br>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label ">User Type</div>
                    <div class="col-lg-9 col-md-8">{{ $user->user_type }}</div>
                  </div><br>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                  </div><br>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Phone</div>
                    <div class="col-lg-9 col-md-8">{{ $user->phone ?? '-' }}</div>
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
