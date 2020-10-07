<nav id="main-navbar" class="navbar-top navbar navbar-expand-md">
	<div class="container collapse navbar-collapse"><div class="row"><div class="col-md-12 col-lg-12">
		{{--
			Left side dropdown for posts
		--}}
		<ul class="navbar-nav">
			<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="/tag/Teardrop">Teardrop</a></li>
			<li class="nav-item"><a class="nav-link" href="/tag/Solar">Solar</a></li>
			<li class="nav-item"><a class="nav-link" href="/calendars">Calendar</a></li>
			<li class="nav-item"><a class="nav-link" href="/about">About</a></li>
		</ul>
		{{--
			Right side dropdown for users
		--}}
		<ul class="navbar-nav navbar-right">
			<li class="nav-item hidden-xs"><a class="nav-link" data-svc="facebook" data-svc-id="TheStaciesPlace" title="Follow on Facebook" href="https://www.facebook.com/TheStaciesPlace" target="_blank"><i class="fab fa-2x fa-facebook"></i></a></li>
			<li class="nav-item hidden-xs"><a class="nav-link" data-svc="instagram" data-svc-id="StaciesPlace" title="Follow on Instagram" href="https://instagram.com/StaciesPlace" target="_blank"><i class="fab fa-2x fa-instagram"></i></a></li>
			<li class="nav-item hidden-xs"><a class="nav-link" data-svc="twitter" data-svc-id="Stacies_Place" title="Follow on Twitter" href="https://twitter.com/stacies_place" target="_blank"><i class="fab fa-2x fa-twitter"></i></a></li>
			<li class="nav-item hidden-xs"><a class="nav-link" data-svc="pinterest" data-svc-id="Stacies_Place" title="Follow on Pinterest" href="https://www.pinterest.com/Stacies_Place" target="_blank"><i class="fab fa-2x fa-pinterest"></i></a></li>
			<li class="nav-item hidden-xs"><a class="nav-link" data-svc="snapchat" data-svc-id="staciesplace" title="Follow on Snapchat" href="https://www.snapchat.com/add/staciesplace" target="_blank"><i class="fab fa-2x fa-snapchat"></i></a></li>
			@if (Auth::guest())
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guest</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ '/login?redirect='.Request::path() }}">Login</a>
						<a class="dropdown-item" href="{{ '/register?redirect='.Request::path() }}">Register</a>
					</div>
				</li>
			@else
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ url('/unread/') }}">Unread Posts</a>
						<a class="dropdown-item" href="{{ url('/user/') }}">View Users</a>
						<a class="dropdown-item" href="{{ url('/user/'.Auth::user()->id) }}">Account Settings</a>
						@if (!Auth::guest()) @if ((Auth::user()->type == App\Models\hh\User::TYPE_ADMIN) || (Auth::user()->type == App\Models\hh\User::TYPE_WRITER))
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/post/create') }}">Create Post</a>
							@if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
							<a class="dropdown-item" href="{{ url('/tag/') }}">Edit Tags</a>
							@endif
							@if (Auth::user()->type == App\Models\hh\User::TYPE_ADMIN)
							<a class="dropdown-item" href="{{ url('/user/create') }}">Create User</a>
							@endif
						@endif @endif
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
					</div>
				</li>
			@endif
		</ul>
	</div></div></div>
</nav>
<form id="logout-form" action="/logout" method="POST" style="display: none;">{{ csrf_field() }}</form>
