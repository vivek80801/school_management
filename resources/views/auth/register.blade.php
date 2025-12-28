@extends("layouts.app")

@section("title", "Register")

@section("content")
    <div class="card">
        <h1>Register</h1>
        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" name="name" value="{{old('name')}}"  />
            </div>
            @error ("name")
                <span class="text-red-500">{{$message}}</span>
            @enderror
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
            <div class="form-group">
                <label for="confirm_password">Confirm Password: </label>
                <input type="password" id="confirmed_password" name="password_confirmation"  />
            </div>
            <br />
            <button type="submit">Register</button>
        </form>
    </div>
@endsection

@push("javascript")
    <script>
        const password = document.getElementById("password");
        const confirmPassword = document.getElementById("confirmed_password");
        const eyeOpenIcon = document.getElementById("eye");
        const eyeCloseIcon = document.getElementById("eye-close");

        eyeCloseIcon.style.cursor = "pointer";
        eyeOpenIcon.style.cursor = "pointer";

        eyeOpenIcon.addEventListener("click", function () {
            password.type = "text";
            confirmPassword.type = "text";
            eyeCloseIcon.style.display = "block";
            eyeOpenIcon.style.display = "none";
        });

        eyeCloseIcon.addEventListener("click", function () {
            password.type = "password";
            confirmPassword.type = "password";
            eyeOpenIcon.style.display = "block";
            eyeCloseIcon.style.display = "none";
        });
    </script>
@endpush
