@extends("layouts.app")
@section("title", "Student")

@section("content")
    <x-classroom::layouts.master>
        <h1>Welcome to Class</h1>
        <div class="card">
            @if (count($classRooms) > 0)
                <table id="class_room_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classRooms as $classRoom)
                            <tr>
                                <td>{{$classRoom->name}}</td>
                                <td>
                                    <button><a href="{{route('classroom.edit', $classRoom->id)}}">Edit</a></button>
                                </td>
                                <td>
                                    <form class="!m-0 !p-0" action="{{route('classroom.destroy', $classRoom->id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <input type="hidden" name="id" value="{{ $classRoom->id }}" />
                                        <button class="!bg-red-500 hover:!ring-red-800 disabled:!ring-red-800" type="submit">Delete</button>
                                    </form>
                                </td>
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
