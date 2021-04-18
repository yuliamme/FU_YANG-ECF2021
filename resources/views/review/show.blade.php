<x-layout>
    @if( $anime = $review->anime->title )@endif
    @if( $user = $review->user->username )@endif
    <x-slot name="title">
        Review on {{ $anime }}
    </x-slot>

    <div>
        <h2 style="margin: 10px 0 30px 0">Review on {{ $anime }} by {{ $user }}</h2>
        <hr>
        <div class="review">
            <h2>Anime : <a href="/anime/{{ $review->anime->id }}"> {{ $anime }} </a></h2>
            <h3>User : <a href="/user/{{ $review->user->id }}"> {{ $user }}</a> </h3>
            <h3>Rating : {{ $review->rating }} / 10</h3>
            <p>{{ $review->comment }}</p>
            <div class="timestamp">
                <small>{{ $review->created_at->diffForHumans() }}</small>
                <small>{{ $review->created_at->format('d/m/Y H:i') }}</small>
            </div>

            <div class="actions">
                <div><a class="cta" href="/review/{{ $review->id }}/edit">Edit Review</a></div>

                <form action="/review/{{ $review->id }}" method="POST">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
{{--                    <input type="hidden" name="_method" value="DELETE">--}}
                    <button type="submit" class="cta">Delete Review</button>
                </form>
            </div>


        </div>

        <div>




</x-layout>
