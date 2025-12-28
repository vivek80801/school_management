@extends("layouts.app")

@section("title", "Login")

@section("content")
    <div class="card">
        <h1>Log in</h1>
        @if (Session::has("success"))
            <span class="text-green-500">{{Session::get("success")}}</span>
        @elseif (Session::has("error"))
            <span class="text-red-500">{{Session::get("error")}}</span>
        @endif
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email: </label>
                <input type="email" name="email" value="{{old('email')}}"  />
            </div>
            @error ("email")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <div class="form-group">
                <label for="password">Password: </label>
                <div class="input-group">
                    <input type="password" id="password" name="password"  />
                    <i class="fa-solid fa-eye" id="eye"></i>
                    <i class="fa-solid fa-eye-slash" style="display: none;" id="eye-close"></i>
                </div>
            </div>
            @error ("password")
                <span class="text-red-500">{{$message}}</span>
            @enderror
            <br />
            <button type="submit">Login</button>
        </form>
    </div>
@endsection

@push("javascript")
    <script>
        const password = document.getElementById("password");
        const eyeOpenIcon = document.getElementById("eye");
        const eyeCloseIcon = document.getElementById("eye-close");

        eyeCloseIcon.style.cursor = "pointer";
        eyeOpenIcon.style.cursor = "pointer";

        eyeOpenIcon.addEventListener("click", function () {
            password.type = "text";
            eyeCloseIcon.style.display = "block";
            eyeOpenIcon.style.display = "none";
        });

        eyeCloseIcon.addEventListener("click", function () {
            password.type = "password";
            eyeOpenIcon.style.display = "block";
            eyeCloseIcon.style.display = "none";
        });
    </script>
@endpush
