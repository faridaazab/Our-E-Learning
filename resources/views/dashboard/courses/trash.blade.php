@extends('layouts.dashboard.master')

@section('title')
    All Deleted Courses ({{ $courses->count() }})
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
                                    <th>Deleted At</th>
                                    @if (auth()->user()->user_type=="admin")
                                    <th>Actions</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->name }}</td>
                                        {{-- limit by character --}}
                                        {{-- <td>{{ $course->description == null ? '-' : Str::limit($course->description, 60, '...') }}</td> --}}
                                        {{-- limit by word --}}
                                        <td>
                                            @if($course->sessions)
                                                @php $sessions = json_decode($course->sessions, true); @endphp
                                                @if(count($sessions) > 0)
                                                    @foreach ($sessions as $session)
                                                        @if(isset($session['name'])) <!-- التأكد من وجود 'name' -->
                                                            <div>
                                                                <span class="badge bg-info">{{ $session['name'] }}</span>
                                                                @if(isset($session['links']) && is_array($session['links']))
                                                                    <ul>
                                                                        @foreach ($session['links'] as $link)
                                                                            <li><a href="{{ $link }}" target="_blank">{{ $link }}</a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <span class="badge bg-danger">Invalid session data</span>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <span class="text-muted">No sessions available.</span>
                                                @endif
                                            @else
                                                <span class="text-muted">No sessions available.</span>
                                            @endif
                                        </td>
                                                                             <td>{{ $course->deleted_at}} </td>
                                       @if (auth()->user()->user_type=="admin")
                                             <td>
                                                <a href="{{ route('courses.restore', $course->id) }}"
                                                    class="btn btn-sm btn-success">Restore</a>
                                                    <a href="{{ route('courses.forceDelete', $course->id) }}"
                                                        class="btn btn-sm btn-danger">Permenet Delete</a>
                                                {{-- <a href="{{ route('courses.show', $course->id) }}"
                                                    class="btn btn-sm btn-warning">Show</a>
                                                <a href="{{ route('courses.edit', $course->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                    style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form> --}}
                                            </td>
                                       @endif

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="alert alert-info text-center">
                                                No courses found.
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
