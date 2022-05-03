<x-layout>
  <section class="form-container">
    <div class="card">
      <div class="form-wrap">
        <h1>Log In</h1>
  
        <form action="/login" method="post">
          @csrf
  
          <div class="form-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email Address" value="{{ old('email') }}" @error('email')class="error"@enderror>
          
            @error('email')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>
  
          <div class="form-field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" @error('password')class="error"@enderror>
          
            @error('password')
              <p class="form-error">{{ $message }}</p>
            @enderror
          </div>
  
          <button type="submit" class="btn btn-full">Log In</button>
        </form>
      </div>
    </div>
  </section>
</x-layout>