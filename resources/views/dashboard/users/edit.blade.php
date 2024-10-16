@extends('layouts.dashboard.master')


@section('title')
    @if (auth()->user()->id != $user->id)
        Edit User ({{ $user-> username }})
    @else
    Edit Your Data
    @endif

@endsection

@section('page-title-1')
    Create Users
@endsection

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            @if (auth()->user()->id != $user->id)
                                Edit User ({{ $user-> username }})
                            @else
                                Edit Your Data
                            @endif
                        </h5>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if ($successMsg= Session::get('success'))
                        <div class="alert alert-success text-center">{{ $successMsg }}</div>
                    @endif
                        <form action="{{ route('users.update',$user->id) }}" method="POST">

                            @if ($unauthorized_action = Session::get('unauthorized_action'))
                            <div class="alert alert-danger text-center">{{ $unauthorized_action }}</div>
                        @endif

                            @csrf
                            @method('PUT')

                            @include('dashboard.users.form')<!-- End General Form Elements -->
                            <div class="d-flex justify-content-lg-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
