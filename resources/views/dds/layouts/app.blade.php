<!DOCTYPE html>
<html lang="en">
<head>
	@section('css')
		<link href="/css/bootstrap.min.css" rel="stylesheet">
	@show
</head>
<body id="app-layout">
	@include('dds.includes.top-navbar')

	@section('contents')
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<br/><br/><br/>
					@yield('content')
				</div>
			</div>
		</div>
	@show
</body>
<footer id="footer">
	@include('dds.includes.footer')
</footer>
</html>
