<x-layout>
  <section class="container">
    <div class="form-wrap">
      <h1 class="form-title">Create New Photo</h1>

      <form action="/photos" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-field">
          <label for="image">Image</label>
          <input type="file" name="image" id="image" @error('image')class="error"@enderror>

          @error('image')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-field">
          <label for="caption">Caption</label>
          <textarea name="caption" id="caption" cols="30" rows="10" @error('caption')class="error"@enderror>{{ old('caption') }}</textarea>

          @error('caption')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-field">
          <label for="location">Location</label>
          <input type="text" name="location" id="location" value="{{ old('location') }}" @error('location')class="error"@enderror>

          @error('location')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn btn-full">Create</button>
      </form>
    </div>
  </section>
</x-layout>