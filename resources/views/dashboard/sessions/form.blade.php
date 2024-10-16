  <!-- General Form Elements -->
  <form action="{{ route('sessions.store') }}">
    <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name',$session->name) }}">
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Links</label>
      <div class="col-sm-10">
        <input type="text" id="links" name="links"class="form-control" value="{{ old('links',$session->links) }}" >
      </div>
    </div>

<!-- End General Form Elements -->
