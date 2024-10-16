  <!-- General Form Elements -->
  <form action="{{ route('users.store') }}">
    <div class="row mb-3">
        <label for="username" class="col-sm-2 col-form-label">UserName<span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input type="text" id="username" class="form-control" name="username" value="{{ old('username',$user->username) }}">
        </div>
      </div>

    <div class="row mb-3">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$user->name) }}">
      </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
        <div class="col-sm-10">
          <input type="text" id="email" class="form-control" name="email" value="{{ old('email',$user->email) }}">
        </div>
      </div>

      <div class="row mb-3">
        <label for="user_type" class="col-sm-2 col-form-label">User Type<span class="text-danger">*</span></label>
        <div class="col-sm-10">
<select name="user_type" id="user_type" class="form-control">
    <option value="student" {{ $user->user_type == 'student' ? 'selected': '' }}>Student</option>
    <option value="instructor"  {{ $user->user_type == 'instructor' ? 'selected': '' }}>Instructor</option>
    <option value="admin"  {{ $user->user_type == 'admin' ? 'selected': '' }}>Admin</option>
</select>
        </div>
      </div>


<!-- End General Form Elements -->
