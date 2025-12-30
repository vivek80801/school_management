@extends("layouts.app")
@section("title", "Student")

@section("content")
    <x-classroom::layouts.master>
        <h1>Hello World</h1>

        <p>Module: {!! config('classroom.name') !!}</p>
    </x-classroom::layouts.master>
@endsection
