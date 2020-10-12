<!DOCTYPE html>
<html lang="en">
<head>
	@include('hh.includes.meta')

	@section('css')
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="{{ asset('hh/css/style.css') }}" rel="stylesheet">
	@show
</head>
<body id="app-layout">
	@section('contents')
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					@yield('content')
				</div>
			</div>
		</div>
	@show
</body>
</html>
