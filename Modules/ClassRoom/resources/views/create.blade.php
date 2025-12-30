@extends("layouts.app")
@section("title", "Student")

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
            @error ("email")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <div class="form-group">
                <label for="password">Password: </label>
                <div class="input-group">
                    <input type="password" id="password" name="password"  />
                    <i class="fa-solid fa-eye" id="eye"></i>
                    <i class="fa-solid fa-eye-slash" style="display: none;" id="eye-close"></i>
                </div>
            </div>
            @error ("password")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Login</button>
        </form>
            <a href="{{route('classroom.index')}}">View Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection
