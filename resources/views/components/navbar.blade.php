<header class="site-header">
    <nav class="site-nav" aria-label="Main navigation">
        <a class="site-nav__brand" href="{{ url('/dashboard') }}">Quantum Quiz</a>
        <ul class="site-nav__links">
            <li><a class="site-nav__link" href="{{ url('/dashboard') }}">Quizzes</a></li>
            <li><a class="site-nav__link" href="{{ url('/history') }}">History</a></li>
            <li><a class="site-nav__link" href="{{ url('/profile') }}">Profile</a></li>
            @if(Auth::user()->isAdmin())
                <li><a class="site-nav__link" href="{{ url('/admin') }}">Admin</a></li>
            @endif
            @auth
                <li class="site-nav__logout">
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
