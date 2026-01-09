@extends("layouts.app")
@section("title", "ClassRoom")

@section("content")
    <x-classroom::layouts.master>
        <div class="card">
            <h1>Edit Class</h1>
            <form action="{{ route('classroom.update', $classroom->id) }}" method="post">
            @method("put")
            @csrf
            <div class="form-group">
                <label for="class_name">Name Of Class: </label>
                <input type="text" name="class_name" value="{{ $classroom->name }}"  />
            </div>
            @error ("class_name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Edit Class</button>
        </form>
            <a href="{{route('classroom.index')}}">View Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection
