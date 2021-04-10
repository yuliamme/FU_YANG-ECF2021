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

      <div class="reviews">
          @foreach($reviews as $review)
              <div class="flow">
                  <h2>{{ $review->rating }}</h2>
                  <p>{{ $review->comment }}</p>
                  <p>{{ $review->created_at->diffForHumans() }}</p>
{{--                  <p>{{ $review->created_at->format('d/m/Y H:i') }}</p>--}}
              </div>
          @endforeach
      </div>

  </article>
</x-layout>
