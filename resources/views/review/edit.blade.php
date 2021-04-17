<x-layout>
    @if( $anime = $review->anime->title )@endif
    @if( $user = $review->user->username )@endif
    <x-slot name="title">
        Edit a review of {{ $anime }}
    </x-slot>

    <div class="edit-review">
        <form action="/review/{{$review->id}}" enctype="multipart/form-data" method="POST">
{{--            @method('PUT')--}}
            @csrf

            <div class="row">
                <h1>Edit my review of <a href="/anime/{{$review->anime->id}}"> {{ $anime }} </a></h1>
            </div>

            <div class="input-group">
                <label for="rating">Rating (from 0 to 10)</label>
                <input id="rating" name="rating" type="number" step="1" min="0" max="10" value="{{ $review->rating }}" required>
                @error('rating')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" maxlength="500" required> {{ $review->comment }} </textarea>
                @error('comment')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="row mt-10">
                <button class="cta">Submit</button>
            </div>

        </form>
    </div>


</x-layout>
