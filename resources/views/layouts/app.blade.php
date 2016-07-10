<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="keywords" content="医学统计，科学统计，统计师">
	    <meta property="qc:admins" content="1653373534341436375" />
	    <link rel="icon" href="">

	    <title>scistats -- 你的科学统计师</title>
		<link rel="stylesheet" type="text/css" href="{{ elixir('css/app.css') }}">
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
		@yield('style')
	</head>
	<body>
		@include('partials.nav')
		<main class="wrapper">
		@yield('content')
		</main>
		<footer class="footer">
			<div class="container">
				<nav class="nav">
					<a class="nav-link" href="/services">服务</a>
					<a class="nav-link" href="/faq">常见问题</a>
					<a class="nav-link" href="/contact">联系我们</a>
				</nav>
				<p>
					<a href="/">Statisticia.com</a> 由 <a href="http://origeno.com" target="_blank">成都元因科技有限公司</a> 设计并维护
				</p>
				<p class="less-significant">
					生命不息，奋斗不止
				</p>
			</div>
		</footer>
		<script src="{{ elixir('js/scripts.js') }}"></script>
		@include('partials.cnzzscript')
		@yield('script')
	</body>
</html>