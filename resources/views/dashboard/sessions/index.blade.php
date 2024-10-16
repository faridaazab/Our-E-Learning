@extends('layouts.dashboard.master')

@section('title')
    All Sessions ({{ $sessions->count() }})
@endsection
@section('page-title-1', 'Sessions')
@section('page-title-2', 'All Sessions')
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
                        <form action="{{ route('sessions.destroyAll') }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="DeleteALL"
                                                        onclick='return confirm("Are you sure that you want to delete ALL sessions?");'>
                                                </form>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Links</th>
                                    <td>Created By</td>
                                    <td>Updated By</td>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sessions as $session)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $session->id }}</td>
                                        <td>{{ $session->name }}</td>
                                        {{-- limit by character --}}
                                        {{-- <td>{{ $session->links == null ? '-' : Str::limit($session->links, 60, '...') }}</td> --}}
                                        {{-- limit by word --}}
                                        <td>{{ $session->links == null ? '-' : Str::words($session->links, 2, '...') }}
                                        </td>
                                        <th>{{ $session->create_user ? $session->create_user->username : '-' }}</th>
                                        <td>{{ $session->update_user ? $session->update_user->username : '-' }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/sessions/') . $session->id }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type=="admin")
                                                <a href="{{ route('sessions.edit', $session->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('sessions.destroy', $session->id) }}" method="POST"
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
                                                No sessions found.
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
