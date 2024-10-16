@extends('layouts.dashboard.master')

@section('title')
Edit Courses for {{ $user->username }}
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Courses for {{ $user->username }}</h5>

            <!-- General Form Elements -->
            <form action="{{ route('students-enrollments.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- ################# For tag input style (requires the select2 library) ################# --}}
                <div class="form-group">
                    <label for="courses">Select Courses:</label>
                    <select name="course_ids[]" id="courses" class="form-control" multiple>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                @if($user->courses->contains($course->id)) selected @endif>
                                    {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- ################# For checkbox style ################# --}}
                {{-- <div class="form-group">
                    <label for="courses">Select Courses:</label>
                    @foreach ($courses as $course)
                    <div class="form-check">
                        <input type="checkbox" name="course_ids[]" id="courses" class="form-check-input" value="{{ $course->id }}">
                        <label for="course-{{ $course->id }}" class="form-check-label">{{ $course->name }}</label>
                    </div>
                    @endforeach
                </div> --}}

                <button type="submit" class="btn btn-primary mt-4">Update</button>
            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $(document).ready(function(){
        $('#courses').select2();
    });
</script>
@endpush
