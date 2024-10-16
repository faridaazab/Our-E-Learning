@extends('layouts.dashboard.master')

@section('title')
    All Deleted Quizzes ({{ $quizzes->count() }})
@endsection
@section('page-title-1', 'Quizzes')
@section('page-title-2', 'All Quizzes')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        @if ($successMsg = Session::get('success'))
                            <div class="alert alert-success text-center">{{ $successMsg }}</div>
                        @endif

                        <form action="{{ route('quizzes.destroyAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DeleteALL"
                                onclick='return confirm("Are you sure that you want to delete ALL quizzes?");'>
                        </form>
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Link of Quiz</th>
                                    <th>Grades</th>
                                    <th>Deleted At</th>
                                    @if (auth()->user()->user_type=="admin")
                                    <th>Actions</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($quizzes as $quiz)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quiz->id }}</td>
                                        <td>{{ $quiz->link }}</td>
                                        {{-- limit by character --}}
                                        {{-- <td>{{ $quiz->grades == null ? '-' : Str::limit($quiz->grades, 60, '...') }}</td> --}}
                                        {{-- limit by word --}}
                                        <td>{{ $quiz->grades == null ? '-' : Str::words($quiz->grades, 2, '...') }}</td>
                                        <td>{{ $quiz->deleted_at}} </td>
                                       @if (auth()->user()->user_type=="admin")
                                             <td>
                                                <a href="{{ route('quizzes.restore', $quiz->id) }}"
                                                    class="btn btn-sm btn-success">Restore</a>
                                                    <a href="{{ route('quizzes.forceDelete', $quiz->id) }}"
                                                        class="btn btn-sm btn-danger">Permenet Delete</a>
                                                {{-- <a href="{{ route('quizzes.show', $quiz->id) }}"
                                                    class="btn btn-sm btn-warning">Show</a>
                                                <a href="{{ route('quizzes.edit', $quiz->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('quizzes.destroy', $quiz->id) }}" method="POST"
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
                                                No quizzes found.
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
