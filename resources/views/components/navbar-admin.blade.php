<header>
<nav>
    <ul>
        <li><a href="/dashboard">Quizzes</a></li>
        <li>    @auth
                <form action="/logout" method="POST">
                    @csrf
                <button>Atteikties</button>
                </form>
                @endauth
        </li>
    </ul>
</nav>
</header>