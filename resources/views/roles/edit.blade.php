@extends("layouts.app")
@section("title", "Role")

@section("content")
    <x-classroom::layouts.master>
        <div class="card">
            <h1>Edit Role</h1>
            <form action="{{ route('roles.update', $role->id) }}" method="post">
            @method("put")
            @csrf
            <div class="form-group">
                <label for="name">Name Of role: </label>
                <input type="text" name="name" value="{{ $role->name }}"  />
            </div>
            @error ("name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Edit Role</button>
        </form>
            <a href="{{route('roles.index')}}">View Role</a>
        </div>
    </x-classroom::layouts.master>
@endsection
