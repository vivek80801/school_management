@extends("layouts.app")
@section("title", "Assign Permission")

@section("content")
    <div class="card">
        <h1>Assign Permission</h1>
        <form action="{{ route('roles.assignpermission') }}" method="post">
            @csrf

            @php
                $permissionGroup = "";
                $isPermissionGroupChanged = false;

                if(count($permissions) > 0)
                {
                    $permissionGroup = explode(".", $permissions[0]->name)[0];
                    $isPermissionGroupChanged = true;
                }
            @endphp
            @foreach($permissions as $key => $permission)
                @if($isPermissionGroupChanged && $key == 0)
                    <h2>{{ucfirst($permissionGroup)}}</h2>
                @endif
                @if($permissionGroup !== explode(".", $permission->name)[0])
                    </br>
                @endif
                @php
                $isPermissionGroupChanged = false;
                $permissionName = explode(".", $permission->name)[0];
                if($permissionGroup !== $permissionName)
                {
                    $permissionGroup = $permissionName;
                    $isPermissionGroupChanged = true;
                }
                @endphp
                @if($isPermissionGroupChanged)
                    <h2>{{ucfirst($permissionGroup)}}</h2>
                @endif
                <div class="form-check">
                    <input class="form-check-input"
                           type="checkbox"
                           name="permissions[]"
                           value="{{$permission->name}}"
                           @checked($role->hasPermissionTo($permission->name))>
                    <label class="form-check-label">
                        {{ ucfirst($permission->name) }}
                    </label>
                </div>
            @endforeach
            @error ("permissions")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <input type="hidden" name="role" value="{{$role->id}}" />
        <br />
        <button type="submit">Assign Role</button>
        </form>
        <a href="{{route('roles.index')}}">View Role</a>
    </div>
@endsection

