  <!-- General Form Elements -->

    <!-- Name Field -->
    <div class="row mb-3">
        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $course->name) }}">
        </div>
    </div>
