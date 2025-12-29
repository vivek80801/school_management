<nav>
    <h1>Logo</h1>
    <ul>
        @if (!Auth::check())
            <li><a class="{{Route::is('home') ? 'active-nav' : ''}}" href="{{ route('home') }}">home</a></li>
            <li><a class="{{Route::is('login') ? 'active-nav' : ''}}" href="{{ route('login') }}">login</a></li>
            <li><a class="{{Route::is('register') ? 'active-nav' : ''}}" href="{{ route('register') }}">register</a></li>
        @else
            <li>
                <form id="logout_form" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button id="logout_btn" type="submit">Logout</button>
                </form>
            </li>
        @endif
    </ul>
</nav>
@if(Auth::check())
    @push("javascript")
        <script>
            const logoutForm = document.getElementById("logout_form");
            const logoutBtn = document.getElementById("logout_btn");

            logoutForm.addEventListener("submit", function (){
                logoutBtn.disabled = true;
                logoutBtn.innerHTML += `
                    <div class="loader">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </div>
                `;
            })
        </script>
    @endpush
@endif
