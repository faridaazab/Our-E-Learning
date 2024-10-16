@extends('layouts.dashboard.master')

@section('title')
    All Feedbacks ({{ $feedbacks->count() }})
@endsection
@section('page-title-1', 'Feedbacks')
@section('page-title-2', 'All Feedbacks')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($successMsg = Session::get('success'))
                            <div class="alert alert-success text-center">{{ $successMsg }}</div>
                        @endif
                        @if (auth()->user()->user_type=='admin')
                        <form action="{{ route('feedbacks.destroyAll') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="DeleteALL"
                                                        onclick='return confirm("Are you sure that you want to delete ALL feedbacks?");'>
                                                </form>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Feedback</th>
                                    <th>Course</th>
                                    <th>Student</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($feedbacks as $feedback)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $feedback->id }}</td>
                                        <td>{{ Str::limit($feedback->feedback, 25, '...') }}</td>
                                        <td>{{ $feedback->course->name }}</td>
                                        <td>{{ $feedback->student->username }}</td>
                                        <td>
                                            <a href="{{ route('feedbacks.show', $feedback->id) }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type=="admin")
                                            <form action="{{ route('feedbacks.destroy', $feedback->id) }}" method="POST"
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
                                                No feedbacks found.
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
