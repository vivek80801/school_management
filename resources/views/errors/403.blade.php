@extends("layouts.app")
@section("title", "Unauthroize")

@section("content")
    <h1>Unauthroized</h1>

    @if(isset($exception))
        <p> {{$exception->getMessage()}} </p>
    @endif
@endsection
