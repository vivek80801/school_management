@extends("layouts.app")
@section("title", "Student")

@section("content")
    <x-student::layouts.master>
        <h1>Hello World</h1>

        <p>Module: {!! config('student.name') !!}</p>
    </x-student::layouts.master>
@endsection
