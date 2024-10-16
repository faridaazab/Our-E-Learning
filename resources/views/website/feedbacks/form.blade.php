  <!-- General Form Elements -->
<!-- General Form Elements -->

<div class="row mb-3">
    <label for="feedback" class="col-sm-2 col-form-label">Feedback</label>
    <div class="col-sm-10">
        <input type="text" id="feedback" name="feedback" class="form-control" value="{{ old('feedback', $feedback->feedback ?? '') }}" required>
        @error('feedback')
            <div class="text-danger">{{ $feedback }}</div>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
        <button type="submit" class="btn btn-primary">Submit Feedback</button>
    </div>
</div>

<!-- End General Form Elements -->
