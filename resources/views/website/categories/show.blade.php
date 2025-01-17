@extends('layouts.website.master')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs aos-init aos-animate" data-aos="fade-in">
      <div class="container">
        <h2 ><a style="color: white" href="{{ route('categorySingle', $category->id ) }}">{{ $category->name }}</a> Details</h2>
        <p>{{ $category->smallDescription }}</p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Category Details Section ======= -->
    <section id="course-details" class="course-details">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <form action="{{ route('categorySingle',$category->id) }}" method="GET">
        <div class="row">
            @if ($successMsg = Session::get('success'))
            <div class="alert alert-success text-center mt-3">
                {{ $successMsg }}
            </div>
            @endif
            @if ($warningMsg = Session::get('warning'))
            <div class="alert alert-warning text-center mt-3">
                {{ $warningMsg }}
                <a href="{{ route('student-enrollments-website.studentIndex', auth()->user()->id) }}"
                    class="text-primary text-decoration-underline font-weight-bold">
                    your courses
                </a>.
            </div>
            @endif
          <div class="col-lg-8">
            <img src="/assets/website/img/course-details.jpg" class="img-fluid" alt="">
            <h3><a href="{{ route('categorySingle', $category->id ) }}">{{ $category->name }}</a></h3>
            <p>{{ $category->description }}</p>
          </div>
          {{-- <div class="col-lg-4">

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Trainer</h5>
              <p><a href="#">Walter White</a></p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Course Fee</h5>
              <p>$165</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Available Seats</h5>
              <p>30</p>
            </div>

            <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Schedule</h5>
              <p>5.00 pm - 7.00 pm</p>
            </div>

          </div> --}}
        </div>
        </form>
      </div>
    </section><!-- End Cource Details Section -->
    {{--  3yza 23ml hna el courses el t7t el category --}}

    <!-- ======= Cource Details Tabs Section ======= -->
    <section id="cource-details-tabs" class="cource-details-tabs">
      <div class="container aos-init" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1" role="tabpanel">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Courses</h3>
                    <p>
                        @forelse ($category->courses as $course)
                            <ul>
                                <li>
                                    <span>{{ $course->name }}</span>
                                    @if(auth()->user()->user_type === "student")
                                    <form action="{{ route('student-enrollments-website.store', auth()->user()->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" name="course_id" id="course_id" class="btn btn-success btn-sm" value="{{ $course->id }}">Enroll</button>
                                    </form>
                                    @endif
                                </li>
                            </ul>
                        @empty
                            There are no courses in this category.
                        @endforelse
                    </p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/website/img/course-details-tab-1.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2" role="tabpanel">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Et blanditiis nemo veritatis excepturi</h3>
                    <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                    <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/website/img/course-details-tab-2.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3" role="tabpanel">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                    <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                    <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/website/img/course-details-tab-3.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4" role="tabpanel">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                    <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                    <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/website/img/course-details-tab-4.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-5" role="tabpanel">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                    <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                    <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="/assets/website/img/course-details-tab-5.png" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Cource Details Tabs Section -->

  </main>
@endsection
