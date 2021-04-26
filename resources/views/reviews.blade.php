<x-layout>
@extends('user.show')

@section

<h1>oh hiiii i'm an imbedded blade view !! </h1>

{{--<div class="reviews">--}}
{{--    @foreach($reviews as $review)--}}
{{--        <div class="flow">--}}
{{--            <h2>{{ $review->rating }}</h2>--}}
{{--            <p>{{ $review->comment }}</p>--}}
{{--            <p>{{ $review->created_at->diffForHumans() }}</p>--}}
{{--            <p>{{ $review->created_at->format('d/m/Y H:i') }}</p>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--</div>--}}

@endsection

</x-layout>
