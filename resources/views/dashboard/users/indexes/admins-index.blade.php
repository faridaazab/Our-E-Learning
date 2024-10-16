@extends('layouts.dashboard.master')

@section('title')
    All Admins ({{ $admins->count() }})
@endsection
@section('page-title-1', 'Admins')
@section('page-title-2', 'All Admins')
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
                                    <th>UserName</th>
                                    <th>Email</th>

                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr >
                                        <td class="@if (auth()->user()->id == $admin->id)bg-dark text-white @endif">{{ $loop->iteration }}</td>
                                        <td class="@if (auth()->user()->id == $admin->id)bg-dark text-white @endif">{{ $admin->id }}</td>
                                        <td class="@if (auth()->user()->id == $admin->id)bg-dark text-white @endif">{{ $admin->username }}</td>
                                        <td class="@if (auth()->user()->id == $admin->id)bg-dark text-white @endif">{{ $admin->email }}</td>
                                        <td class="@if (auth()->user()->id == $admin->id)bg-dark text-white @endif">
                                            <a href="{{ route('users.show', $admin->username) }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type=="admin")
                                                <a href="{{ route('users.edit', $admin->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('users.destroy', $admin->id) }}" method="POST"
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
                                                No Admins found.
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
