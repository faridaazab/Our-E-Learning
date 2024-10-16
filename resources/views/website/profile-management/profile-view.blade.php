@extends('layouts.website.master')

@section('content')
<main id="main" style="margin-top: 70px; margin-bottom: 70px; padding: 50px;">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($successMsg = Session::get('success'))
        <div class="alert alert-success text-center w-50 mx-auto">{{ $successMsg }}</div>
    @endif

    <h3>Profile Management</h3>

    <form action="{{ route('updateProfile', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <div class="d-flex align-items-center justify-content-start gap-5">
                <div>
                    <input type="radio" value="male" name="gender" id="gender" {{ $user->gender == 'male' ? 'checked' : '' }}>
                    <label>Male</label>
                </div>
                <div>
                    <input type="radio" value="female" name="gender" id="gender" {{ $user->gender == 'female' ? 'checked' : '' }}>
                    <label>Female</label>
                </div>
            </div>
        </div>

        <input type="submit" value="Update" class="btn btn-primary btn-md d-block mx-auto">

    </form>

</main>
@endsection
