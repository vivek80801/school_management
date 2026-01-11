@extends("layouts.app")
@section("title", "Section")

@section("content")
    <x-classsection::layouts.master>
        <h1>Welcome to Section</h1>
        <div class="card">
            @if (count($classSections) > 0)
                <table id="class_section_table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classSections as $classSection)
                            <tr>
                                <td>{{$classSection->name}}</td>
                                <td>
                                    <button><a href="{{route('classsection.edit', $classSection->id)}}">Edit</a></button>
                                </td>
                                <td>
                                    <form class="!m-0 !p-0" action="{{route('classsection.destroy', $classSection->id)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                        <input type="hidden" name="id" value="{{ $classSection->id }}" />
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
            <a href="{{route('classsection.create')}}">Create Section</a>
        </div>
    </x-classsection::layouts.master>
@endsection

@push("javascript")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            $(document).ready(function () {
                $('#class_section_table').DataTable();
            });
        })
    </script>
@endpush
