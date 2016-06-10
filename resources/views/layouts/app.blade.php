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
<footer id="footer">
	@include('includes.footer')
</footer>
</html>