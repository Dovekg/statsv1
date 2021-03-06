<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="医学统计，科学统计，统计师">
    <meta property="qc:admins" content="1653373534341436375" />
    <link rel="icon" href="">

    <title>scistats -- 你的科学统计师</title>

	<link rel="stylesheet" type="text/css" href="/css/all.css">
	@yield('styles')
</head>

<body class="navbar-bottom layout-boxed">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-boxed">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"><img src="/images/logo-white.png" alt=""></a>

				<ul class="nav navbar-nav pull-right visible-xs-block">
					<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
					<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
			</div>

			<div class="navbar-collapse collapse" id="navbar-mobile">
				<ul class="nav navbar-nav">
					<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<img src="{{ Auth::user()->avatar }}" alt="">
							<span>{{ Auth::user()->name }}</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="{{ route('profile.show') }}"><i class="icon-user-plus"></i>个人资料</a></li>
							<li class="divider"></li>
							<li><a href="{{ route('profile.change') }}"><i class="icon-cog5"></i> 账户修改</a></li>
							<li><a href="/logout"><i class="icon-switch2"></i> 登出</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page header -->
	@yield('page-header')
	<!-- /page header -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			@if(Auth::user()->is('admin'))
				@include('partials.admin_sidebar')
			@elseif(Auth::user()->is('analyst') || Auth::user()->is('moderator'))
				@include('partials.analyst_sidebar')
			@else
				@include('partials.sidebar')
			@endif

			@yield('content')

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	<!-- Footer -->
	<div class="navbar navbar-default navbar-fixed-bottom footer">
		<div class="navbar-boxed">
			<ul class="nav navbar-nav visible-xs-block">
				<li><a class="text-center collapsed" data-toggle="collapse" data-target="#footer"><i class="icon-circle-up2"></i></a></li>
			</ul>

			<div class="navbar-collapse collapse" id="footer">
				<div class="navbar-text">
					&copy; 2016. <a href="#" class="navbar-link">Scistats</a> by <a href="http://origeno.com" class="navbar-link" target="_blank">Origeno</a>
				</div>

				<div class="navbar-right">
					<ul class="nav navbar-nav">
						{{--<li><a href="#">Terms</a></li>--}}
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- /footer -->


	<script type="text/javascript" src="/js/all.js"></script>
	@include('partials.cnzzscript')
	@include('sweet::alert')
	@yield('scripts')

</body>
</html>
