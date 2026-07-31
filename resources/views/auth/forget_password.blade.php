@extends("layouts.app")

@section("title", "Verify Email")

@section("content")
    <div class="card">
        <h1>Verify Email</h1>
        @session("status")
            <span>{{$value}}</span>
        @endsession
        <form action="{{ route('forget_password') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" value="{{old('email')}}"  />
            </div>
            @error ("email")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Verify</button>
        </form>
    </div>
@endsection

