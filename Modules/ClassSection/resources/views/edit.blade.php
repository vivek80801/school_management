@extends("layouts.app")
@section("title", "Section")

@section("content")
    <x-classroom::layouts.master>
        <div class="card">
            <h1>Edit Class</h1>
            <form action="{{ route('classsection.update', $classsection->id) }}" method="post">
            @method("put")
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" value="{{ $classsection->name }}"  />
            </div>
            @error ("class_name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Edit Class</button>
        </form>
            <a href="{{route('classsection.index')}}">View Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection
