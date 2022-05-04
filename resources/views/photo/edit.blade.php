<x-layout>
  <section class="container">
    <div class="form-wrap">
      <h1 class="form-title">Edit Photo</h1>

      <form action="/photos/{{ $photo->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-field">
          <img src="/storage/{{ $photo->image }}" alt="" class="edit-photo">
        </div>

        <div class="form-field">
          <label for="caption">Caption</label>
          <textarea name="caption" id="caption" cols="30" rows="10" @error('caption')class="error"@enderror>{{ $photo->caption }}</textarea>

          @error('caption')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>

        <div class="form-field">
          <label for="location">Location</label>
          <input type="text" name="location" id="location" value="{{ $photo->location }}" @error('location')class="error"@enderror>

          @error('location')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>

        <button type="submit" class="btn btn-full">Update</button>
      </form>

      <div class="delete-form">
        <form action="/photos/{{ $photo->id }}" method="post">
          @csrf
          @method('DELETE')
  
          <button type="submit" class="btn btn-delete">Delete this photo</button>
        </form>
      </div>
    </div>
  </section>
</x-layout>