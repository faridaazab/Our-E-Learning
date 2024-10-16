@extends('layouts.dashboard.master')
@inject('quiz', '\App\Models\Quiz')

@section('title')
    All Quizzes
@endsection

@section('page-title-1')
    Create Quiz
@endsection

@section('content')


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Quiz</h5>
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

                        <form action="{{ route('quizzes.store') }}" method="POST">
                            @csrf
                            @include('dashboard.quizzes.form')<!-- End General Form Elements -->
                            <div class="d-flex justify-content-lg-center">
                                <button type="submit" class="btn btn-primary">Add</button>
                              </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
