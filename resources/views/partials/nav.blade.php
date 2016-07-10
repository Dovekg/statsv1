<nav class="navbar">
    <div class="container">
        <button class="navbar-toggle btn btn-default hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#navbar-collapse">
        &#9776;
        </button>
        <a class="navbar-brand" href="/">
            <img src="/images/logo.png" height="30">
        </a>
        
        <div class="collapse navbar-toggleable-sm" id="navbar-collapse">
            @if (Auth::user())
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item switcher">
                    <a class="btn btn-primary" href="{{ route('dashboard.tasks.create') }}" role="button">
                        提交需求
                    </a>
                </li>
            </ul>
            @endif
            <ul class="nav navbar-nav pull-right">
                <li class="nav-item"><a href="/" class="nav-link">主页</a></li>
                <li class="nav-item"><a href="/services" class="nav-link">服务</a></li>
                <li class="nav-item"><a href="/faq" class="nav-link">常见问题</a></li>
                <li class="nav-item"><a href="/contact" class="nav-link">联系我们</a></li>
                <li class="nav-item dropdown">
                    @if (Auth::user())
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <div class="dropdown-menu" role="menu">
                        <h6 class="dropdown-header">内容管理</h6>
                        <a class="dropdown-item" href="/dashboard">管理需求</a>
                        <a class="dropdown-item" href="/profile">个人资料</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ url('/logout') }}">退出</a>
                    </div>
                    @else
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">注册/登录<span class="caret"></span></a>
                    <div class="dropdown-menu" role="menu">
                        <h6 class="dropdown-header">常规</h6>
                        <a class="dropdown-item" href="{{ url('/login') }}">登录</a>
                        <a class="dropdown-item" href="{{ url('/register') }}">注册</a>
                        <div class="dropdown-divider"></div>
                        <h6 class="dropdown-header">社交账号</h6>
                        <ul class="social-icons">
                            <li class="social-icon"><a href="/"><i class="fa fa-qq" style="color: #00a0d6"></a></i></li>
                            <li class="social-icon"><a href="/"><i class="fa fa-weixin" style="color: #51c332"></a></i></li>
                            <li class="social-icon"><a href="/"><i class="fa fa-weibo" style="color: #e3272b"></a></i></li>
                        </ul>
                    </div>
                    @endif
                    
                </li>
            </ul>
        </div>
        
    </div>
</nav>