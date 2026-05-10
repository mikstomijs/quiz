<header>
<nav>
    <ul>
        <li><a href="/dashboard">Quizzes</a></li>
        <li><a href="history">History</a></li>
        <li><a href="/profile">Profile</a></li>
        <li>    @auth
                <form action="/logout" method="POST">
                    @csrf
                <button>Logout</button>
                </form>
                @endauth
        </li>
    </ul>
</nav>
</header>