@extends("layouts.app")
@section("title", "section")

@section("content")
    <x-classsection::layouts.master>
        <div class="card">
            <h1>Section</h1>
            <form action="{{ route('classsection.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="{{old('name')}}"  />
                </div>
                @error ("name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            </br>
            <button type="submit">Create</button>
            </form>
            <a href="{{route('classsection.index')}}">View Section</a>
        </div>
    </x-classsection::layouts.master>
@endsection
