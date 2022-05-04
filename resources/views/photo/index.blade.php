<x-layout>
  <section class="container">
    <h1>Photos</h1>

    @if (count($photos) > 0)
      <div class="gallery-wrap">
        <div class="gallery">
          <div class="gallery-sizer"></div>
          @foreach ($photos as $photo)
            <a href="/storage/{{ $photo->image }}" class="gallery-item">
              <img src="/storage/{{ $photo->image }}" alt="">
            </a>
          @endforeach
        </div>
      </div>
    @else
      <h4>No photos found</h4>
    @endif
  </section>
</x-layout>