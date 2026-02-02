@extends("layouts.app")
@section("title", "Assign Role")

@section("content")
    <div class="card">
        <h1>Assign Role</h1>
        <form action="{{ route('users.roles.roleassign') }}" method="post">
            @csrf
            @foreach($roles as $key => $role)
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="roles[]"
                           value="{{$role->name}}"
                           @checked($user->hasRole($role->name))>
                    <label class="form-check-label">
                        {{ ucfirst($role->name) }}
                    </label>
                </div>
            @endforeach
            @error ("roles")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <input type="hidden" name="user" value="{{$user->id}}" />
        <br />
        <button type="submit">Assign Role</button>
        </form>
        <a href="{{route('users.index')}}">View Users</a>
    </div>
@endsection

