@extends("layouts.app")
@section("title", "Role")

@section("content")
    <div class="card">
        <h1>Create Role</h1>
        <form action="{{ route('roles.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="role_name">Name Of Role: </label>
                <input type="text" name="name" value="{{old('name')}}"  />
            </div>
            @error ("name")
            <span class="text-red-500">{{$message}}</span>
        @enderror
        <br />
        <button type="submit">Create Role</button>
        </form>
        <a href="{{route('roles.index')}}">View Role</a>
    </div>
@endsection

