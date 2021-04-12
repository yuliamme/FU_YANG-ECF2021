<x-layout>
  <x-slot name="title">
    Nouvelle critique de {{ $anime->title }}
  </x-slot>

    <div class="add-review">
{{--        <form action="/anime/{id}" enctype="multipart/form-data" method="post">--}}
            <form method="POST" enctype="multipart/form-data" action="{{ url('/') }}">

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
                <textarea id="comment" name="comment" maxlength="500" value="{{ old('comment') }}" required></textarea>
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
