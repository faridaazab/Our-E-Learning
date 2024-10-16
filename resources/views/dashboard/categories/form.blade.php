  <!-- General Form Elements -->
  <form action="{{ route('categories.store') }}">
    <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$category->name) }}">
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Description</label>
      <div class="col-sm-10">
        <input type="text" id="description" name="description"class="form-control" value="{{ old('description',$category->description) }}" >
      </div>
    </div>

<!-- End General Form Elements -->
