<nav id="main-navbar" class="navbar-top navbar navbar-expand-md navbar-light">
	<a class="navbar-brand" href="{{ url('/') }}">
		<img src="{{ asset('ct/CTClassic.png') }}" alt="CT Classic Logo">
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto smooth-scroll">
			<li class="nav-item ml-auto">
				<a class="nav-link" href="{{ url('#home') }}" data-rel="back">HOME</a>
			</li>
			<li class="nav-item ml-auto">
				<a class="nav-link" href="{{ url('#services') }}" data-rel="back">SERVICES</a>
			</li>
			<li class="nav-item ml-auto">
				<a class="nav-link" href="{{ url('#about') }}">ABOUT US</a>
			</li>
			<li class="nav-item ml-auto">
				<a class="nav-link" href="{{ url('#portfolio') }}" data-rel="back">PORTFOLIO</a>
			</li>
			<li class="nav-item ml-auto">
				<a class="nav-link" href="{{ url('#contact') }}">CONTACT US</a>
			</li>
		</ul>
	</div>
</nav>
