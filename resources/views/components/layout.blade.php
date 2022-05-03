<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <title>{{ config('app.name') }}</title>
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="navbar-left">
        <a href="/">Home</a>
        <a href="#">Photos</a>
      </div>

      @auth
        <div class="navbar-right">
          <a href="#">My Profile</a>
          
          <form action="/logout" method="post">
            @csrf
  
            <button type="submit">Log Out</button>
          </form>
        </div>
      @else
        <div class="navbar-right">
          <a href="/login">Log In</a>
          <a href="/register">Sign Up</a>
        </div>
      @endauth
    </nav>
  </header>

  <main>
    {{ $slot }}
  </main>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>