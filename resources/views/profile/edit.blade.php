<x-layout>
  <section class="container">
    <div class="form-wrap">
      <h1 class="form-title">Edit Your Profile</h1>
    
      <form action="/profile" method="post" enctype="multipart/form-data">
        @csrf
    
        <div class="form-field">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" value="{{ $user->name }}" @error('name')class="error"@enderror>
    
          @error('name')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>
    
        <div class="form-field">
          <label for="avatar">Image</label>
          <input type="file" name="avatar" id="avatar">
    
          @error('avatar')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>
    
        <div class="form-field">
          <label for="bio">Bio</label>
          <textarea name="bio" id="bio" cols="30" rows="10" @error('bio')class="error"@enderror>{{ $user->profile->bio }}</textarea>
        
          @error('bio')
            <p class="form-error">{{ $message }}</p>
          @enderror
        </div>
    
        <button type="submit" class="btn btn-full">Save Changes</button>
      </form>
    </div>
  </section>
</x-layout>