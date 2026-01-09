@extends("layouts.app")
@section("title", "Student")

@section("content")
    <x-classroom::layouts.master>
        <h1>Welcome to Class</h1>
        <div class="card">
            @if (count($class_rooms) > 0)
                <table id="class_room_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($class_rooms as $class_room)
                            <tr>
                                <td>{{$class_room->name}}</td>
                                <td>
                                    <button><a href="{{route('classroom.edit', $class_room->id)}}">Edit</a></button>
                                </td>
                                <td><button>Delete</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>No Class Found</h4>
            @endif
            <a href="{{route('classroom.create')}}">Create Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection

@push("javascript")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $('#class_room_table').DataTable();
            });
        })
    </script>
@endpush
