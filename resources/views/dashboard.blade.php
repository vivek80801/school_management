@extends("layouts.app")

@section("title", "Dashboard")

@section("content")
    <h1>Welcome {{auth()->user()->name}}</h1>
@endsection
