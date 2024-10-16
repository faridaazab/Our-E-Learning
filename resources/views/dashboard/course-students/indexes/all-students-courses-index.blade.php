@extends('layouts.dashboard.master')

@section('title')
    All User with Courses ({{ $users->count() }})
@endsection

@section('page-title-1', 'Categories')
@section('page-title-2')
    All User with Courses ({{ $users->count() }})
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <table class="table datatable">
              <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Courses</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <ul class="list-group">
                                @foreach ($user->courses as $course)
                                    <li class="list-group-item">
                                        <div class="d-flex">
                                            <span>{{ $course->name }}</span>
                                            @if(auth()->user()->user_type === 'admin')
                                            &nbsp;&nbsp;
                                            <form action="{{ route('students-enrollments.destroy', [$user->id, $course->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                            </form>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
