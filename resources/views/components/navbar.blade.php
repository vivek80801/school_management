<nav>
    <h1>Logo</h1>
    <ul>
        <li><a class="{{Route::is('home') ? 'active-nav' : ''}}" href="{{ route('home') }}">home</a></li>
        @if (!Auth::check())
            <li><a class="{{Route::is('login') ? 'active-nav' : ''}}" href="{{ route('login') }}">login</a></li>
            <li><a class="{{Route::is('register') ? 'active-nav' : ''}}" href="{{ route('register') }}">register</a></li>
        @else
            <li><a class="{{Route::is('dashboard') ? 'active-nav' : ''}}" href="{{ route('dashboard') }}">dashboard</a></li>
            <li>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endif
    </ul>
</nav>
