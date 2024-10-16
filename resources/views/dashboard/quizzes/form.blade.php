  <!-- General Form Elements -->
  <form action="{{ route('quizzes.store') }}">
    <div class="row mb-3">
      <label for="inputText" class="col-sm-2 col-form-label">Link of Quiz</label>
      <div class="col-sm-10">
        <input type="text" id="link" class="form-control" name="link" value="{{ old('link',$quiz->link) }}">
      </div>
    </div>

    <div class="row mb-3">
      <label class="col-sm-2 col-form-label">Grades</label>
      <div class="col-sm-10">
        <input type="text" id="grades" name="grades"class="form-control" value="{{ old('grades',$quiz->grades) }}" >
      </div>
    </div>

<!-- End General Form Elements -->
