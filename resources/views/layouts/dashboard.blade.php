<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>scistats -- 你的科学统计师</title>

	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/colors.css" rel="stylesheet" type="text/css"> -->
	<!-- /global stylesheets -->
	<!-- <link rel="stylesheet" href="/css/sweetalert.css"> -->
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
							<li><a href="#"><i class="icon-user-plus"></i>个人资料</a></li>
							<li class="divider"></li>
							<li><a href="{{ route('profile.show') }}"><i class="icon-cog5"></i> 账户修改</a></li>
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

	<!-- Core JS files -->
	<!-- <script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script> -->
	<!-- <script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script> -->
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<!-- <script type="text/javascript" src="/js/sweet_alert.min.js"></script> -->
	<!-- <script type="text/javascript" src="/assets/js/core/app.js"></script> -->
	<!-- /theme JS files -->

	<script type="text/javascript" src="/js/all.js"></script>
	@include('sweet::alert')
	@yield('scripts')

</body>
</html>
