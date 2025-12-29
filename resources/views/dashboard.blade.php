@extends("layouts.app")

@section("title", "Dashboard")

@section("content")
    @if (Session::has("success"))
        <span class="text-green-500">{{Session::get("success")}}</span>
    @elseif (Session::has("error"))
        <span class="text-red-500">{{Session::get("error")}}</span>
    @endif
    <x-menubar />
    <h1>Welcome {{auth()->user()->name}}</h1>
@endsection
