@extends("layouts.app")
@section("title", "Roles")

@section("content")
    <section>
        <h1>Welcome to Role</h1>
        <div class="card">
            @if (count($roles) > 0)
                <table id="role_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td>
                                    <button><a href="{{route('roles.permissions', $role->id)}}">Permission</a></button>
                                </td>
                                <td>
                                    <button><a href="{{route('roles.edit', $role->id)}}">Edit</a></button>
                                </td>
                                <td>
                                    <form class="!m-0 !p-0" action="{{route('roles.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <input type="hidden" name="id" value="{{ $role->id }}" />
                                        <button class="!bg-red-500 hover:!ring-red-800 disabled:!ring-red-800" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>No Role Found</h4>
            @endif
            <a href="{{route('roles.create')}}">Create Role</a>
        </div>
    </section>
@endsection

@push("javascript")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $('#role_table').DataTable();
            });
        })
    </script>
@endpush
