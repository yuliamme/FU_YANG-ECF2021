<x-layout>
  <x-slot name="title">
    Nouvelle critique de {{ $anime->title }}
  </x-slot>

    <div class="add-review">
{{--                <form method="POST" action='/anime/{id}/new_review'>--}}
                    <form action="/anime/{{ $anime->id }}/review" enctype="multipart/form-data" method="POST">

            @csrf

            <div class="row">
                <h1>Nouvelle Critique de {{ $anime->title }}</h1>
            </div>

            <div class="input-group">
                <label for="rating">Rating (from 0 to 10)</label>
                <input id="rating" name="rating" type="number" step="1" min="0" max="10" value="{{ old('rating') }}" required>
                @error('rating')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" maxlength="1000" required></textarea>
                @error('comment')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

{{--                        @auth--}}
{{--                            <input type="hidden" value="{{ Auth::user()->id }}" name="userid">--}}
{{--                        @endauth--}}
                        <input type="hidden" value="{{ $anime -> id }}" name="anime_id">

            <div class="row p-10">
                <button type="submit" class="cta">Add New Review</button>
            </div>

        </form>
    </div>


</x-layout>
