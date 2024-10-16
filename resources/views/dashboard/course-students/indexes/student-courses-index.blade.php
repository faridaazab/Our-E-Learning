@extends('layouts.dashboard.master')

@section('title')
    {{ $user->username }}'s Courses ({{ $user->courses()->count() }})
@endsection

@section('page-title-1', 'Categories')
@section('page-title-2')
    {{ $user->username }}'s Courses ({{ $user->courses()->count() }})
@endsection

@section('content')
    <h2>{{ $user->username }}'s Enrolled Courses</h2>

    @if ($successMsg = Session::get('success'))
    <div class="alert alert-success text-center mt-3">
        {{ $successMsg }}
    </div>
    @endif

    @if ($warningMsg = Session::get('warning'))
    <div class="alert alert-info text-center mt-3">
        {{ $warningMsg }}
    </div>
    @endif

    <ul class="list-group">
        @forelse ($user->courses as $course)
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
        @empty
            <li class="list-group-item">No courses enrolled yet.</li>
        @endforelse
    </ul>

    <a href="{{ route('students-enrollments.create', $user->id) }}" class="btn btn-success mt-3">Enroll in Course(s)</a>
@endsection
