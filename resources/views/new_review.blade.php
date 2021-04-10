<x-layout>
  <x-slot name="title">
    Nouvelle critique de {{ $anime->title }}
  </x-slot>

    <div class="add-review">
        <form action="/anime/{id}/new_review" enctype="multipart/form-data" method="get">
        @csrf

            <div class="row">
                <h1>Nouvelle Critique de {{ $anime->title }}</h1>
            </div>

            <div class="input-group">
                <label for="rating">Rating</label>
                <input id="rating" name="rating" value="{{ old('rating') }}" required>
                @error('rating')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="input-group">
                <label for="comment">Comment</label>
                <input id="comment" name="comment" value="{{ old('comment') }}" required>
                @error('comment')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="row p-10">
                <button class="cta">Add New Review</button>
            </div>

        </form>
    </div>


</x-layout>
