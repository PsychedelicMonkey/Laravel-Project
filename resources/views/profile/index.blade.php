<x-layout>
  <section class="container">
    <div class="profile-wrap">
      @if ($user->profile->avatar != null)
        <img src="/storage/{{ $user->profile->avatar }}" alt="">
      @elseif ($user->profile->social_avatar != null)
        <img src="{{ $user->profile->social_avatar }}" alt="">
      @endif
      
      <h1>{{ $user->name }}</h1>
  
      @if ($user->profile->bio != null)
        <div>{{ $user->profile->bio }}</div>
      @endif

      @auth
        @if (auth()->user()->id == $user->id)
          <a href="/profile/edit">Edit your profile</a>
        @endif
      @endauth
    </div>
  </section>
</x-layout>