<nav class="navbar navbar-expand-sm bg-light">
	<a class="navbar-brand" href="/">
		<img src="/dds/images/Studio_pencil.png" alt="Drawing of colored pencils that spell out Delightful Drawings Studio.">
	</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="/">Home</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/about">About Me</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Art
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					@foreach(App\Models\dds\Drawing::SITE_CATEGORIES as $category)
						<a class="dropdown-item" href="/drawings/pencil/{{ $category }}">{{ $category }}</a>
					@endforeach
				</div>
			</li>
		</ul>
	</div>
</nav>
