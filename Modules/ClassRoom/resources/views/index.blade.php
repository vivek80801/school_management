@extends("layouts.app")
@section("title", "Student")

@section("content")
    <x-classroom::layouts.master>
        <h1>Welcome to Class</h1>
        <div class="card">
            @if (count($class_rooms) > 0)
                @foreach($class_rooms as $class_room)
                    <span>{{$class_room->name}}</span>
                @endforeach
            @else
                <h4>No Class Found</h4>
            @endif
            <a href="{{route('classroom.create')}}">Create Class</a>
        </div>
    </x-classroom::layouts.master>
@endsection
