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
        <form action="{{ route('login') }}" method="post" id="login_form">
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
            <button id="login_submit_btn" type="submit">Login</button>
        </form>
    </div>
@endsection

@push("javascript")
    <script>
        const password = document.getElementById("password");
        const eyeOpenIcon = document.getElementById("eye");
        const eyeCloseIcon = document.getElementById("eye-close");
        const loginForm = document.getElementById("login_form");
        const loginSubmitBtn = document.getElementById("login_submit_btn");

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

        loginForm.addEventListener("submit", function (){
            loginSubmitBtn.disabled = true;
            loginSubmitBtn.innerHTML += `
                <div class="loader">
                    <i class="fa-solid fa-arrows-rotate"></i>
                </div>
            `;
        })
    </script>
@endpush
