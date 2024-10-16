@extends('layouts.website.master')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Learning Today,<br>Leading Tomorrow</h1>
      <h2>Welcome To Our E-Learning Website</h2>
    </div>
  </section><!-- End Hero -->
@section('content')

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="/assets/website/img/about.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Empowering Learning Through Innovation and Excellence.</h3>
            <p class="fst-italic">
                Our platform is dedicated to providing high-quality education for students and professionals worldwide.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Access a wide range of courses designed by experts across various fields.</li>
              <li><i class="bi bi-check-circle"></i> Flexible learning options to suit your schedule and pace.</li>
              <li><i class="bi bi-check-circle"></i> Interactive learning tools and resources for a better learning experience.</li>
            </ul>
            <p>
                Join our community of learners and take the next step in your education journey with our user-friendly platform.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    {{-- <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="({{ }})" data-purecounter-duration="1" class="purecounter"></span>
            <p>Students</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="64" data-purecounter-duration="1" class="purecounter"></span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
            <p>Events</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
            <p>Trainers</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section --> --}}

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="content">
              <h3>Why Choose This PlatForm?</h3>
              <p>
                Our platform is designed to provide an engaging and flexible learning experience, allowing you to learn at your own pace. With a wide variety of courses taught by industry experts, we ensure quality education that meets your needs.
                Whether you’re looking to upgrade your skills or start a new career path, we have the resources to help you succeed.
              </p>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-receipt"></i>
                    <h4>Expert-Led Courses</h4>
                    <p>Learn from industry professionals with real-world experience and gain the skills employers are looking for.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-cube-alt"></i>
                    <h4>Flexible Learning</h4>
                    <p>Study at your own pace, with full control over your schedule, while accessing resources anytime, anywhere.</p>
                  </div>
                </div>
                <div class="col-xl-4 d-flex align-items-stretch">
                  <div class="icon-box mt-4 mt-xl-0">
                    <i class="bx bx-images"></i>
                    <h4>Interactive Learning Tools</h4>
                    <p>Engage with a variety of interactive content including quizzes and videos to enhance your learning.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Why Us Section -->


  </main><!-- End #main -->

@endsection
