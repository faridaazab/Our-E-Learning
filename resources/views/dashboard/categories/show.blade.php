@extends('layouts.dashboard.master')

@section('title')
   Show Category
@endsection
@section('page-title-1', 'Categories')
@section('page-title-2', 'All Categories')
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

            <form action="{{ route('categories.show',$category->id) }}" method="GET">
            <div class="tab-content pt-2">


                <h5 class="card-title">Category Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Name</div>
                  <div class="col-lg-9 col-md-8">{{ $category->name }}</div>
                </div><br>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Description</div>
                  <div class="col-lg-9 col-md-8">{{ $category->description }}</div>
                </div><br>

                <div class="row">
                    <div class="col-lg-3 col-md-4 label">Created By</div>
                    <div class="col-lg-9 col-md-8">{{ $category->create_user->username ?? '-' }}</div>
                  </div><br>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Updated By</div>
                    <div class="col-lg-9 col-md-8">{{ $category->update_user->username ?? '-' }}</div>
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
