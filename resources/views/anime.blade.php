<x-layout>
  <x-slot name="title">
    {{ $anime->title }}
  </x-slot>

  <article class="anime">
    <header class="anime--header">
      <div>
        <img alt="" src="/covers/{{ $anime->cover }}" />
      </div>
      <h1>{{ $anime->title }}</h1>
    </header>
    <p>{{ $anime->description }}</p>
    <div>
      <div class="actions">
        <div>
          <a class="cta" href="/anime/{{ $anime->id }}/new_review">Écrire une critique</a>
        </div>
        <form action="/anime/{{ $anime->id }}/add_to_watch_list" method="POST">
          <button class="cta">Ajouter à ma watchlist</button>
        </form>
      </div>
    </div>

{{--      @yield('reviews')--}}

      <div class="reviews">

          @if(count($reviews) > 0)
              @foreach($reviews as $review)
                  <div class="review">
                      <h2><a href="/user/{{ $review->user->id }}"> {{ $review->user->username }} </a></h2>
                      <h3>Rating : {{ $review->rating }} / 10</h3>
                      <p>{{ $review->comment }}</p>
                      <div class="timestamp">
                          <small>{{ $review->created_at->diffForHumans() }}</small>
                          <small>{{ $review->created_at->format('d/m/Y H:i') }}</small>
                      </div>
                  </div>
              @endforeach
          @else
              <p>No Reviews found. Be the first to write a review!</p>
          @endif

      </div>

  </article>
</x-layout>
