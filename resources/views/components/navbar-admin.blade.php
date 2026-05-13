<header class="site-header">
    <nav class="site-nav" aria-label="Admin navigation">
        <a class="site-nav__brand" href="{{ url('/admin') }}">Admin</a>
        <ul class="site-nav__links">
            <li><a class="site-nav__link" href="{{ url('/dashboard') }}">Quizzes</a></li>
            <li><a class="site-nav__link" href="{{ url('/admin') }}">Control panel</a></li>
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
