<!DOCTYPE html>
<html lang="en">
<head>
	@section('meta')
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	@show

	<title>@yield('title','HoxsieHouse')</title>

	@section('css')
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
	@show
</head>
<body id="app-layout">
	@include('includes.top-navbar')

	@section('contents')
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					@include('includes.notifications')
					@yield('content')
				</div>
			</div>
		</div>
	@show
</body>
<footer>
	@section('scripts')
		<script src="/js/jquery-2.2.3.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
	@show
</footer>
</html>
