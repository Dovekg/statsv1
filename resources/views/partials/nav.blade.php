<div class="container">
    <a href="/" class="logo"></a>
    <nav class="navbar">
        <ul class="nav-links">
            @if (Auth::guest())
                <li><a href="/register">注册</a></li>
                <li><a href="/login">登陆</a></li>
            @else
            <li>
                <a href="/home"><i class="fa fa-gear fa-spin"></i>{{ Auth::user()->name }}</a>
            </li>
            @endif
        </ul>
    </nav>
</div>
    