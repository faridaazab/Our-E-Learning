@extends('layouts.website.master')

@section('content')
<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Categories</h2>
        <p> We strive to deliver high-quality experiences by offering categories that cater to various needs and interests. Our selection ensures you can find valuable insights, resources, and tools tailored to your preferences.</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

          <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @forelse ($categories as $category)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="course-item">
                <img src="/assets/website/img/course-1.jpg" class="img-fluid" alt="...">
                <div class="course-content">
                  {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>{{ $category->name }}</h4>
                  </div> --}}

                  <h3><a href="{{ route('categorySingle', $category->id ) }}">{{ $category->name }}</a></h3>
                  <p>{{ $category->smallDescription }}</p>
                  <div class="trainer d-flex justify-content-between align-items-center">
                    <div class="trainer-profile d-flex align-items-center">
                      <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    </div>
                  </div>
                </div>
              </div>
            </div> <!-- End Course Item -->
            @empty
            <p>There are no categories found.</p>
            @endforelse
          </div>

        </div>
      </section><!-- End Courses Section -->

  </main><!-- End #main -->

@endsection
