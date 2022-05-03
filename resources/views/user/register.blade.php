<x-layout>
  <section class="form-container">
    <div class="card">
      <div class="form-wrap">
        <h1>Sign Up</h1>
  
        <form action="/register" method="post">
          @csrf
  
          <div class="form-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Jane Doe" value="{{ old('name') }}" @error('name')class="error"@enderror>

            @error('name')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" @error('email')class="error"@enderror>
          
            @error('email')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" @error('password')class="error"@enderror>
          
            @error('password')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-field">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" @error('password_confirmation')class="error"@enderror>
          
            @error('password_confirmation')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>
  
          <button type="submit" class="btn btn-full">Sign Up</button>
        </form>
      </div>
    </div>
  </section>
</x-layout>