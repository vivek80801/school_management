@extends("layouts.app")
@section("title", "Class")

@section("content")
    <x-classroom::layouts.master>
        <div class="card">
            <h1>Create Class</h1>
            <form action="{{ route('classroom.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="class_name">Name Of Class: </label>
                <input type="text" name="class_name" value="{{old('class_name')}}"  />
            </div>
            @error ("class_name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Create Class</button>
        </form>
            <a href="{{route('classroom.index')}}">View Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection
