<x-layout>

<div class="add-anime">

    <h1>Add New Anime</h1>

    <form action="/anime" enctype="multipart/form-data" method="POST">

    @csrf

        <div class="input-group">
            <label for="title">Anime</label>
            <input name="title" value="{{ old('rating') }}" placeholder="Anime Title" required>
            @error('rating')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group">
            <label for="description">Description</label>
            <textarea name="description" maxlength="1000" value="{{ old('comment') }}" placeholder="Anime Description" required></textarea>
            @error('comment')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group">
            <button type="submit" class="cta">Add New Anime</button>
        </div>


    </form>


    {{--    {!! Form::open(['action' => 'App\Http\Controllers\AnimeController@store', 'method' => 'POST']) !!}--}}
{{--    {!! Form::open(['action' => 'AnimeController@store', 'method' => 'POST']) !!}--}}
{{--    {!! Form::open(['url' => 'foo/bar']) !!}--}}

{{--    <div class="input-group">--}}
{{--        {{Form::label('title', 'Title')}}--}}
{{--        {{Form::text('title', '', ['placeholder' => 'Anime Title'])}}--}}
{{--    </div>--}}

{{--    <div class="input-group">--}}
{{--        {{Form::label('description', 'Description')}}--}}
{{--        {{Form::textarea('description', '', ['placeholder' => 'Anime Description...'])}}--}}
{{--    </div>--}}

{{--    {{Form::submit('Submit',['class' =>'cta'])}}--}}

{{--    {!! Form::close() !!}--}}

</div>

</x-layout>
