@extends('layouts.dashboard.master')

@section('title')
    All Courses ({{ $courses->count() }})
@endsection
@section('page-title-1', 'Courses')
@section('page-title-2', 'All Courses')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($successMsg = Session::get('success'))
                            <div class="alert alert-success text-center">{{ $successMsg }}</div>
                        @endif
                        <form action="{{ route('courses.destroyAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DeleteALL"
                                onclick='return confirm("Are you sure that you want to delete ALL courses?");'>
                        </form>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Sessions</th>
                                    @if(auth()->user()->user_type == "admin")
                                        <th>Instructor</th>
                                    @endif
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->name }}</td>
                                        <td>
                                            @forelse ($course->sessions as $session)
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="d-flex">
                                                            <span>{{ $session->name }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @empty
                                                <div class="d-flex">
                                                    <span>No sessions.</span>
                                                </div>
                                            @endforelse
                                        </td>
                                        @if(auth()->user()->user_type == "admin")
                                            <td>{{$course->instructor->username}}</td>
                                        @endif
                                        <td>
                                            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type == "instructor")
                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @endif
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No courses available.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
