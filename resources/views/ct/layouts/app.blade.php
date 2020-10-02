<!DOCTYPE html>
<html lang="en">
<head>
	@include('ct.includes.meta')
	@section('css')
		<link rel="shortcut icon" href="{{ asset('ct/CT.png') }}">
		<link href="{{ asset('ct/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('ct/css/style.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
	@show
</head>
<body id="app-layout">
	@include('ct.includes.top-navbar')
	@section('contents')
		@yield('content')
	@show
</body>
<footer id="footer">
	@include('ct.includes.footer')
</footer>
</html>
