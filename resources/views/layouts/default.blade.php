<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="医学统计，科学统计，统计师">
    <link rel="icon" href="">

    <title>scistats -- 你的科学统计师</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/extra.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/extra.css"> -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<section id="header">
    <div class="top-bar"></div>
    <div class="container">
        <a href="/" class="logo"></a>
        <nav class="navbar">
            <ul class="nav-links">
                @if(!Auth::user())
                    <li><a href="/login">登陆</a></li>
                    <li><a href="/register">注册</a></li>
                @else
                    <li><a href="/dashboard"><span class="btn btn-primary"><i class="icon icon-gear spinner"></i>&nbsp;管理面版</span></a></li>
                @endif
            </ul>
        </nav>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-md-push-6">
                <div class="stats">
                    <img class="stats-illustration" src="/images/stats.png" width="460">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-md-pull-6">
                <div class="headline">
                    <h1>科研从未如此清晰</h1>
                    <p class="lead" style="font-size: 20px;line-height: 2em;letter-spacing: 1px;">scistats初期旨在解决科研过程中的数据管理与分析的问题，让科研人员不再为数据的繁杂、不精确担心。把费神伤脑的<strong>统计分析</strong>交给scistats</p>
                </div>
                <div class="head-btn">
                    <a href="/login" class="btn btn-primary"><i class="fa fa-paper-plane-o">&nbsp;&nbsp;&nbsp;&nbsp;</i>开始体验</a>
                </div>
            </div>
        </div>
    </div>
    <div class="white-fade"></div>
</section>

@yield('content')


<!-- <script src="/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

@yield('script')
</body>
</html>
