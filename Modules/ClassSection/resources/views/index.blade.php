@extends("layouts.app")
@section("title", "section")

@section("content")
    <x-classsection::layouts.master>
        <h1>Hello World</h1>

        <p>Module: {!! config('classsection.name') !!}</p>
    </x-classsection::layouts.master>
@endsection
