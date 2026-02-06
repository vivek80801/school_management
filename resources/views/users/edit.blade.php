@extends("layouts.app")
@section("title", "User")

@section("content")
    <div class="card">
        <h1>Edit User</h1>
        <form action="{{ route('users.update', $user->id) }}" method="post">
            @method("put")
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" value="{{ $user->name }}"  />
            </div>
            @error ("name")
                <span class="text-red-500">{{$message}}</span>
            @enderror

            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" value="{{ $user->email }}"  />
            </div>
            @error ("email")
                <span class="text-red-500">{{$message}}</span>
            @enderror
        <br />
        <button type="submit">Edit User</button>
        </form>
        <a href="{{route('users.index')}}">View Role</a>
    </div>
@endsection
