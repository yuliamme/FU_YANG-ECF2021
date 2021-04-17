<x-layout>
    <x-slot name="title">
        User: {{ $user->username }}
    </x-slot>

    <div>
        <h2 style="margin: 10px 0 30px 0">Profile of {{$user->username}}</h2>
        <hr>

        <div class="reviews">

            @if(count($reviews) > 0)
                @foreach($reviews as $review)
                    <div class="review">
                        <h2><a href="/anime/{{ $review->anime->id }}"> {{ $review->anime->title }} </a></h2>
                        <h3>Rating : {{ $review->rating }} / 10</h3>
                        <p>{{ $review->comment }}</p>
                        <div class="timestamp">
                            <small>{{ $review->created_at->diffForHumans() }}</small>
                            <small>{{ $review->created_at->format('d/m/Y H:i') }}</small>
                        </div>

                        <a href="/review/{{ $review->id }}">detail</a>
                    </div>
                @endforeach
            @else
                <p>No Review found. This person didn't write anything yet...</p>
            @endif

        </div>
    </div>


</x-layout>
