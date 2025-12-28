<nav>
    <h1>Logo</h1>
    <ul>
        <li><a class="{{Route::is('home') ? 'active-nav' : ''}}" href="{{ route('home') }}">home</a></li>
        <li><a class="{{Route::is('login') ? 'active-nav' : ''}}" href="{{ route('login') }}">login</a></li>
        <li><a class="{{Route::is('register') ? 'active-nav' : ''}}" href="{{ route('register') }}">register</a></li>
    </ul>
</nav>
