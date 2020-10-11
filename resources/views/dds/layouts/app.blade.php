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
		<link rel="shortcut icon" href="{{ asset('dds/images/favicon.png') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('dds/css/style.css') }}" rel="stylesheet">
	@show
</head>
<body id="app-layout">
	@include('dds.includes.top-navbar')

	@section('contents')
		@include('dds.includes.notifications')
		@yield('content')
	@show
</body>
<footer id="footer">
	@include('dds.includes.footer')
</footer>
</html>
