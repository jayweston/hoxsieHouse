<!DOCTYPE html>
<html lang="en">
<head>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-137867478-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-137867478-1');
	</script>
	@include('dds.includes.meta')

	@section('css')
		<link href="/dds/css/bootstrap.min.css" rel="stylesheet">
		<link href="/dds/css/font-awesome.css" rel="stylesheet">
		<link href="/dds/css/style.css" rel="stylesheet">
	@show
</head>
<body id="app-layout">
	@include('dds.includes.top-navbar')

	@section('contents')
		@yield('content')
	@show
</body>
<footer id="footer">
	@include('dds.includes.footer')
</footer>
</html>
