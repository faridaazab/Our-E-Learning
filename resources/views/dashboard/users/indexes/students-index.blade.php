@extends('layouts.dashboard.master')

@section('title')
    All Students
@endsection
@section('page-title-1', 'Students')
@section('page-title-2', 'All Students')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($successMsg = Session::get('success'))
                            <div class="alert alert-success text-center">{{ $successMsg }}</div>
                        @endif

                        @if ($unauthorized_action = Session::get('unauthorized_action'))
                            <div class="alert alert-danger text-center">{{ $unauthorized_action }}</div>
                        @endif

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Courses</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($students as $student)
                                    <tr >
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">{{ $loop->iteration }}</td>
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">{{ $student->id }}</td>
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">{{ $student->username }}</td>
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">{{ $student->email }}</td>
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">
                                            <a href="{{ route('students-enrollments.studentIndex', $student->id) }}" class="btn btn-sm btn-warning">Show Courses</a>
                                            <a href="{{ route('students-enrollments.create', $student->id) }}" class="btn btn-sm btn-success">Enroll</a>
                                            @if($student->courses->count() != 0)
                                            <a href="{{ route('students-enrollments.edit', $student->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            @endif
                                        </td>
                                        <td class="@if (auth()->user()->id == $student->id)bg-dark text-white @endif">
                                            <a href="{{ route('users.show', $student->username) }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type=="admin")
                                                <a href="{{ route('users.edit', $student->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('users.destroy', $student->id) }}" method="POST"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                                @endif

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-info text-center">
                                                No Students found.
                                            </div>
                                        </td>
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
