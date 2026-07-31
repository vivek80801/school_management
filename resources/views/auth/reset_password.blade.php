@extends("layouts.app")

@section("title", "Reset Password")

@section("content")
    <div class="card">
        <h1>Reset Password</h1>
        @session("status")
            <h1>{{$value}}</h1>
        @endsession
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value={{$token}}  />
            <input type="hidden" name="email" value={{$email}}  />

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
            <button type="submit">Reset Password</button>
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

