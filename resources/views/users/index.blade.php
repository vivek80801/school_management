@extends("layouts.app")
@section("title", "Users")

@section("content")
    <section>
        <h1>Welcome to User</h1>
        <div class="card">
            @if (count($users) > 0)
                <table id="user_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Roles</th>
                            <th>Assign Roles</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td><button><a href="{{route('users.roles', $user->id)}}">Roles</a></button></td>
                                <td><button><a href="{{route('users.roles.assign', $user->id)}}">Assign Roles</a></button></td>
                                <td>
                                    <button><a href="{{route('users.edit', $user->id)}}">Edit</a></button>
                                </td>
                                <td>
                                    <form class="!m-0 !p-0" action="{{route('users.destroy', $user->id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <input type="hidden" name="id" value="{{ $user->id }}" />
                                        <button class="!bg-red-500 hover:!ring-red-800 disabled:!ring-red-800" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>No User Found</h4>
            @endif
            <a href="{{route('users.create')}}">Create Users</a>
        </div>
    </section>
@endsection

@push("javascript")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $('#user_table').DataTable();
            });
        })
    </script>
@endpush
