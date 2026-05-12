<header>
<nav>
    <ul>
        <li><a href="/dashboard">Quizzes</a></li>
        <li><a href="history">History</a></li>
        <li><a href="/profile">Profile</a></li>
            
        @if(Auth::user()->isAdmin())
        <li>    
        <a href='/admin'>Admin panel</a>
        </li>
        @endif

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