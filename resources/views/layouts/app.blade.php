<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.meta')
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
