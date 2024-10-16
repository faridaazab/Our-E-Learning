@extends('layouts.dashboard.master')

@section('title')
    All Categories ({{ $categories->count() }})
@endsection
@section('page-title-1', 'Categories')
@section('page-title-2', 'All Categories')
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
                        <form action="{{ route('categories.destroyAll') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="DeleteALL"
                                onclick='return confirm("Are you sure that you want to delete ALL categories?");'>
                        </form>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <td>Created By</td>
                                    <td>Updated By</td>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        {{-- limit by character --}}
                                        {{-- <td>{{ $category->description == null ? '-' : Str::limit($category->description, 60, '...') }}</td> --}}
                                        {{-- limit by word --}}
                                        <td>
                                            {{ $category->description == null ? '-' : Str::words($category->description, 2, '...') }}
                                        </td>
                                        <th>{{ $category->create_user ? $category->create_user->username : '-' }}</th>
                                        <td>{{ $category->update_user ? $category->update_user->username : '-' }}</td>
                                        <td>
                                            <a href="{{ route('categories.show', $category->id) }}"
                                                class="btn btn-sm btn-warning">Show</a>
                                            @if(auth()->user()->user_type=="admin")
                                                <a href="{{ route('categories.edit', $category->id) }}"
                                                    class="btn btn-sm btn-primary">Edit</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
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
                                                No categories found.
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
