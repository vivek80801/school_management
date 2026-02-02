@extends("layouts.app")
@section("title", "Users Role")

@section("content")
    <section>
        <h1>Welcome to Users Role</h1>
        <div class="card">
            @if (count($user->roles) > 0)
                <table id="role_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user->roles as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>No Role is assigned to this user</h4>
            @endif
            <a href="{{route('users.index')}}">Back</a>
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
